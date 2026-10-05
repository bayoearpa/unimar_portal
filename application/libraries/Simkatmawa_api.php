<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Klien HTTP untuk API SIMKATMAWA. Token disimpan di session server.
 */
class Simkatmawa_api
{
    protected $CI;
    protected $cfg;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->config->load('simkatmawa', TRUE);
        $this->cfg = $this->CI->config->item('simkatmawa', 'simkatmawa');
        $this->CI->load->library('session');
    }

    public function cfg() { return $this->cfg; }

    public function module($key)
    {
        return isset($this->cfg['modules'][$key]) ? $this->cfg['modules'][$key] : NULL;
    }

    public function is_logged_in()
    {
        return (bool) $this->CI->session->userdata('smw_token');
    }

    public function logout()
    {
        $this->CI->session->unset_userdata(['smw_token', 'smw_user', 'smw_kode_pt']);
    }

    public static function dot_get($arr, $path, $default = NULL)
    {
        foreach (explode('.', $path) as $seg) {
            if (is_array($arr) && array_key_exists($seg, $arr)) {
                $arr = $arr[$seg];
            } else {
                return $default;
            }
        }
        return $arr;
    }

    public function login($email, $password)
    {
        $l   = $this->cfg['login'];
        $res = $this->request($l['method'], $l['path'], [
            $l['user_field'] => $email,
            $l['pass_field'] => $password,
        ], FALSE);

        if (!$res['ok']) {
            return $res;
        }
        $token = self::dot_get($res['data'], $l['token_path']);
        if (!$token) {
            $res['ok']    = FALSE;
            $res['error'] = 'Login berhasil tetapi token tidak ditemukan pada respons.';
            return $res;
        }
        $this->CI->session->set_userdata([
            'smw_token'   => $token,
            'smw_user'    => $email,
            'smw_kode_pt' => (string) self::dot_get($res['data'], $l['kode_pt_path'], ''),
        ]);
        return $res;
    }

    /**
     * @return array ['ok','status','data','error']
     */
    public function request($method, $path, $data = [], $auth = TRUE)
    {
        $method  = strtoupper($method);
        $url     = rtrim($this->cfg['base_url'], '/') . '/' . ltrim($path, '/');
        $headers = ['Accept: application/json'];

        if ($auth) {
            $token = $this->CI->session->userdata('smw_token');
            if (!$token) {
                return ['ok' => FALSE, 'status' => 401, 'data' => NULL, 'error' => 'Belum login ke SIMKATMAWA.'];
            }
            $headers[] = $this->cfg['auth_header'] . ': ' . $this->cfg['auth_prefix'] . $token;
        }

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT        => $this->cfg['timeout'],
            CURLOPT_SSL_VERIFYPEER => $this->cfg['ssl_verify'],
            CURLOPT_SSL_VERIFYHOST => $this->cfg['ssl_verify'] ? 2 : 0,
            CURLOPT_CUSTOMREQUEST  => $method,
        ]);

        if ($method === 'GET') {
            if ($data) { $url .= (strpos($url, '?') === FALSE ? '?' : '&') . http_build_query($data); }
        } elseif ($this->cfg['body_format'] === 'json') {
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $body   = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err    = curl_error($ch);
        curl_close($ch);

        if ($body === FALSE) {
            return ['ok' => FALSE, 'status' => 0, 'data' => NULL, 'error' => 'Gagal terhubung ke API: ' . $err];
        }

        $json = json_decode($body, TRUE);
        $ok   = $status >= 200 && $status < 300;

        // API bisa membalas HTTP 200 tetapi success/status = false
        if ($ok && is_array($json)) {
            if ((isset($json['success']) && $json['success'] === FALSE) ||
                (isset($json['status'])  && $json['status']  === FALSE)) {
                $ok = FALSE;
            }
        }
        if ($status === 401) {
            $this->logout(); // token tidak valid / kedaluwarsa
        }

        return [
            'ok'     => $ok,
            'status' => $status,
            'data'   => $json,
            'error'  => $ok ? '' : $this->extract_error($json, $status),
        ];
    }

    protected function extract_error($json, $status)
    {
        if (!is_array($json)) {
            return 'API mengembalikan status ' . $status;
        }
        $parts = [];
        if (isset($json['message']) && is_string($json['message'])) {
            $parts[] = $json['message'];
        } elseif (isset($json['error']) && is_string($json['error'])) {
            $parts[] = $json['error'];
        }
        if (isset($json['errors']) && is_array($json['errors'])) {
            foreach ($json['errors'] as $field => $msg) {
                $msg = is_array($msg) ? implode(', ', array_filter($msg, 'is_scalar')) : (string) $msg;
                $parts[] = $field . ': ' . $msg;
            }
        }
        return $parts ? implode(' | ', $parts) : 'API mengembalikan status ' . $status;
    }
}
