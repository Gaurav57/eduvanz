<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by Web Preparations
 */
class Users extends CI_Controller 
{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user');
    }
    
    /*
     * User account information
     */
    public function account()
    {
        $data = array();
        if($this->session->userdata('isUserLoggedIn'))
        {
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $this->load->view('users/header');
            $this->load->view('users/account', $data);
            $this->load->view('users/footer');
        }
        else
        {
            redirect('users/login');
        }
    }
    
    /*
     * User login
     */
    public function login()
    {
        if($this->input->post('loginSubmit'))
        {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) 
            {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLogin = $this->user->getRows($con);
                if($checkLogin)
                {
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    redirect('users/account/');
                }
                else
                {
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
        //load the view
        $this->load->view('header');
        $this->load->view('users/login');
        $this->load->view('footer');
    }
    
    /*
     * User registration
     */
    public function registration()
    {
        $data = array();
        $userData = array();
        $data = array();
        if($this->session->userdata('success_msg'))
        {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg'))
        {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('regisSubmit'))
        {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
            $this->form_validation->set_rules('profession', 'Profession', 'required');
            $this->form_validation->set_rules('locality', 'Locality', 'required');
            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'age' => strip_tags($this->input->post('age')),
                'dob' => $this->input->post('dob'),
                'profession' => strip_tags($this->input->post('profession')),
                'locality' => $this->input->post('locality'),
                'guest_no' => strip_tags($this->input->post('guest_no')),
                'address' => $this->input->post('address')
            );

            if($this->form_validation->run() == true)
            {
                $insert = $this->user->insert($userData);
                if($insert)
                {
                    $this->session->set_userdata('success_msg', 'Your registration was successfully.');
                }
                else
                {
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        $data['user'] = $userData;
        //load the view
        $this->load->view('header');
        $this->load->view('users/registration', $data);
        $this->load->view('footer');
    }
    
    /*
     * User logout
     */
    public function logout()
    {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('users/login/');
    }
    
    /*
     * Existing email check during validation
     */
    public function email_check($str)
    {
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->user->getRows($con);
        if($checkEmail > 0)
        {
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } 
        else 
        {
            return TRUE;
        }
    }
}