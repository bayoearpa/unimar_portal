<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['administrasi'] = 'administrasi';


//kliring
$route['ujianakhir'] = 'welcome/fpuktsk_home';
$route['permohonanujianakhir'] = 'welcome/fpuktsk';
$route['pencarianpengajuan'] = 'welcome/fpuktsks';
$route['klaim/(:num)'] = 'welcome/klaim/$1';
$route['cetakberitaacaras1/(:num)'] = 'welcome/ctk_beritaacaras1/$1';
$route['cetaksurattugass1/(:num)'] = 'welcome/ctk_surattugass1/$1';
$route['cetakberitaacarad3/(:num)'] = 'welcome/ctk_beritaacarad3/$1';
$route['cetaksurattugasd3/(:num)'] = 'welcome/ctk_surattugasd3/$1';
$route['cetakberitaacaras1sk/(:num)'] = 'welcome/ctk_beritaacaras1sk/$1';
$route['cetaksurattugass1sk/(:num)'] = 'welcome/ctk_surattugass1sk/$1';
// $route['klaim'] = 'welcome/klaim';
$route['permohonanujianakhirp'] = 'welcome/fpuktskp';

//kliring UAS
$route['uas'] = 'kliring';
$route['permohonanuas'] = 'kliring/fpuas';
$route['permohonanuasp'] = 'kliring/fpuasp';
$route['permohonanuas_edit/(:num)'] = 'kliring/edit_uas_datadiri/$1';
$route['permohonanuas_editp'] = 'kliring/edit_uas_datadirip';
$route['pencarianpengajuanuas'] = 'kliring/fpuaskn';


//kliring prada
$route['prada'] = 'kliring/index_prada';
$route['ajuan_prada'] = 'kliring/ajuan_prada';
$route['proses_prada'] = 'kliring/fppradap';
$route['cek_prada'] = 'kliring/fpprada_cari';

//kliring PKL
$route['pkl'] = 'kliring/index_pkl';
$route['ajuan_pkl'] = 'kliring/ajuan_pkl';
$route['proses_pkl'] = 'kliring/fppklp';
$route['cek_pkl'] = 'kliring/fppkl_cari';

//kliring Turun PKL
$route['tpkl'] = 'kliring/index_tpkl';
$route['ajuan_tpkl'] = 'kliring/ajuan_tpkl';
$route['proses_tpkl'] = 'kliring/fptpklp';
$route['cek_tpkl'] = 'kliring/fptpkl_cari';

//kliring Semester antara
$route['semestera'] = 'kliring/index_smta';
$route['ajuan_smta'] = 'kliring/ajuan_smta';
$route['ajuan_smta2'] = 'kliring/ajuan_smta2';
$route['ajuan_smta_cek'] = 'kliring/ajuan_smta_cek23';
$route['ajuan_smta_cek_khusus'] = 'kliring/ajuan_smta_cek_khusus';
$route['proses_smta'] = 'kliring/fpsmtap';
$route['cek_smta'] = 'kliring/fpsmta_cari';
$route['tutorial_smta_download'] = 'kliring/tutorial_smta_download';

//kuesioner
$route['kues_mhdsn'] = 'kues/kues_mhdsn';
$route['kues_mhlem'] = 'kues/kues_mhlem';
$route['kues_tenlem'] = 'kues/kues_tenlem';
$route['kues_dsnlem'] = 'kues/kues_dsnlem';

//front_web_lpm
$route['front_skp_mhsdsn'] = 'front_lpm';
$route['front_skp_mhsdsn_cek'] = 'front_lpm/kues_mhsdsn_prosesrekap';

//monitoring
$route['baak/mon_add/(:num)'] = 'baak/mon_add/$1';

// //Mahatar
// $route['mahatar_prestasi'] = 'welcome/mhtr_prestasi';
// $route['mahatar_kegiatan'] = 'welcome/mhtr_kegiatan';


//manajemen aset
$route['aset'] = 'aset';
$route['aset/detail_inventaris/(:num)'] = 'aset/detail_inven/$1';

//API
$route['api/kues/mhsdsn'] = 'Rest_api_tbl_kues_mhsdsn/index';


$route['translate_uri_dashes'] = FALSE;
