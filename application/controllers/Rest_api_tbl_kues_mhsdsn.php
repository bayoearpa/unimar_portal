<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPATH. "libraries/format.php";
require APPATH. "libraries/RestController.php";
use chriskacerguis\RestServer\RestController;	


class Rest_api_tbl_kues_mhsdsn extends RestController {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_restapi');
	}

	public function index_get()
	{
		$data = $this->m_restapi->get_tbl_kues_mhsdsn();
	}

}

/* End of file Rest_api_tbl_kues_mhsdsn.php */
/* Location: ./application/controllers/Rest_api_tbl_kues_mhsdsn.php */