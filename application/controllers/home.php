<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: uBt
 * Date: 09.11.2013
 * Time: 00:16
 */

session_start();

Class Home extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){

        if($this->session->usedata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['username']=$session_data['username'];
            $this->load->view('home_view',$data);
        }else{

            redirect('login','refresh');
        }
    }

    function logout(){

        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home','refresh');
    }

}