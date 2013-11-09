<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: uBt
 * Date: 09.11.2013
 * Time: 00:00
 */

Class Uyekontrol extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('user','',TRUE);

    }

function index(){

    $this->load->library('Form_validation');

    $this->form_validation->set_rules('username','Username','trim|required|xss_clean');
    $this->form_validation->set_rules('password','Password','trim|required|xss_clean|callback_check_database');

    if($this->form_validation->run() == false){

        $this->load->view('login_view');
    }else{
        redirect('home','refresh');
    }

        function md5check_database($password){
            $username = $this->input->post('username');

            $result = $this->user->login($username,$password);

            if($result)
            {
                $sess_array = array();
                foreach($result as $row)
                {

                    $session_array = array(
                        'id'=>$row->id,
                        'username'=>$row->username
                    );
                    $this->session->set_userdata('logged_in',$session_array);

                }
                return TRUE;
            }else{
                $this->form_validation->set_message('check_database','Kullanıcı Adı veya Şifre Hatalı');
                return false;
            }
        }
    }
}