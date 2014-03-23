<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require 'general.php';

class CUser extends General
{

    private $user;

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('isLogin') == false) {
            $this->session->set_userdata('message', 'you must login to see this page');
            header("Location: /login");
            exit;
        }

        $this->user = $this->session->userdata('user');
    }

    public function profile()
    {
        $this->load->model('user','users');
        $page = '';
        $data['pk_i_id'] = $this->user->pk_i_id;
        $post_ = $this->input->post();
        if ($post_) {
            $data['i_user_type'] = 1;
            $data['s_email'] = $this->user->s_email;

	        $data['s_name'] = $this->input->post('s_name');
	        $data['s_password'] = $this->input->post('s_password');
	        $data['s_phone'] = $this->input->post('s_phone');
	        $data['s_address'] = $this->input->post('s_address');
	        $data['s_website'] = $this->input->post('s_website');
	        $data['s_username'] = $this->input->post('s_username');
	        $data['i_ktp'] = $this->input->post('i_ktp');
	        $data['i_rek'] = $this->input->post('i_rek');
	        $data['s_bank'] = $this->input->post('s_bank');
	        $data['s_bank_name'] = $this->input->post('s_bank_name');

	        $data = array_merge($data);
            if ($_FILES['s_image']) {
                $config = array(
                    'path' => 'images/user'
                );
                $this->load->model('fupload', '', false, $config);
                // image_name, image_folder, file_param
                $upload = $this->fupload->do_upload($data['pk_i_id'], 's_image');
                if ($upload) {
                    $data['s_image'] = $upload['file_name'];
                    $exec = $this->users->updateImageById($data);
                    if ($exec != 1) {
                        $sessionData = array(
                            'message' => 'error uploading image'
                        );
                    }
                }
            }
            $data['dt_modified'] = date('Y-m-d H:i:s');
            $exec = $this->users->updateById($data);
            if ($exec == 1) {
                $page = (Array)$this->users->findByid($data['pk_i_id']);
                $sessionData = array(
                    'user' => $page[0],
                    'message' => 'Thank you, your profile has been update'
                );
            } else {
                $sessionData = array(
                    'message' => 'error updating fields'
                );
            }
            $this->session->set_userdata($sessionData);
        }

        if (!$page) {
            $page = (Array)$this->users->findByid($data['pk_i_id']);
        }
        $data['page'] = $page[0];
        $data['title'] = $page[0]->s_name;

        $this->doView('profile', $data);
    }

    public function change_password(){

        $data['pk_i_id'] = $this->user->pk_i_id;

        $this->load->model('user', 'users');
        $find_user = (Array)$this->users->findByid($data['pk_i_id']);
        $find_user = $find_user[0];

        if (!$find_user) {
            $this->doView('404');
            return;
        }

        $data['title'] = "Change Password";

        $data['old_password'] = $this->input->post('old_password');
        $data['password1'] = $this->input->post('password1');
        $data['password2'] = $this->input->post('password2');

        if ($this->input->post()) {

            if (md5($data['old_password']) != $find_user->s_password) {
                $this->session->set_userdata(array('message' => "your old password didn't match"));
                $this->doView('change_password', $data);
                return;
            }

            if (!$data['password1'] || !$data['password2'] || ($data['password1'] != $data['password2'])) {
                $this->session->set_userdata(array('message' => "New Password dosn't valid"));
                $this->doView('change_password', $data);
                return;
            }

            $updatePass = $this->users->updateUserPasswordByIdAndPass($find_user->pk_i_id, $find_user->s_password, md5($data['password2']));            
            $this->session->set_userdata(array('message' => "Password successfully changed"));

        }

        $this->doView('change_password', $data);
    }

    public function change_email()
    {

        $data['pk_i_id'] = $this->user->pk_i_id;

        $this->load->model('user', 'users');
        $page = (Array)$this->users->findByid($data['pk_i_id']);

        $page = $page[0];
        if (!$page) {
            $this->doView('404');
            return;
        }

        $data['s_email'] = $this->input->post('s_email');

        if ($data['s_email']) {
            require_once '/application/controllers/cemail.php';
            $cemail = new CEmail();
            $emailParrams = (array)$page;

            $key = str_replace('=','d3V1l',base64_encode($page->pk_i_id.','.$page->s_key.','.$data['s_email']));

            $emailParrams['s_link'] = base_url().'update_email/'.$key;

            $exec = $cemail->send_mail($data['s_email'], 'update_email', $emailParrams);
            switch ($exec) {
                case 1:
                    $msg = 'invalid email address';
                    break;
                case 2:
                    $msg = 'content not found';
                    break;
                case 3:
                    $msg = 'email not send, maybe protocol not set :(';
                    break;
                default:
                    $msg = 'Thank you, we have send your validating email, check your email inbox';
                    break;
            }
            $this->session->set_userdata(array('message' => $msg));
        }
        $data['page'] = $page;
        $data['title'] = $page->s_name;

        $this->doView('change_email', $data);
    }

    public function logout()
    {
        $this->load->library('session');
        header("Location: /index.php");
        $sessionData = array('isLogin' => 0, 'user' => null);
        $this->session->unset_userdata($sessionData);
    }


}

?>