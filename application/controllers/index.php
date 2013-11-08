<?php

Class Index Extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->view('index_view');
	}
}

?>