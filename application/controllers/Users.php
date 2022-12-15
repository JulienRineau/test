<?php

class Users extends CI_Controller
{

    public function show($user_id)
    {
        //$this->load->model('user_model');
        $data['result'] = $this->user_model->get_users($user_id);

        $this->load->view('user_view',$data);

        // foreach ($result as $object) 
        // {
        //     echo $object->username."<br>";
        // }
    }

    public function test(){

        $data['main_view'] = "test_view";
        $this->load->view('layouts/main',$data);
    }


    public function delete($id)
    {
        $this->user_model->delete_user($id);
    }

    public function login()
    {
        // echo $this->input->post('username');
        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');

        if($this->form_validation->run() == FALSE)
        {
            $data = array
            (
                'errors_login' => validation_errors("<p class='alert alert-danger'>","</p>")
            );
            $this->session->set_flashdata($data);
            redirect('home');
        }
        else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user_id = $this->user_model->login_user($username,$password);

            if($user_id){
                $result = $this->user_model->get_users($user_id);
                $user_data = array(
                    'user_id'=>$user_id,
                    'username'=>$username,
                    'surns'=>$result->surns,
                    'fams'=>$result->fams,
                    'coin'=>$result->coin,
                    'admin'=>$result->admin,
                    'logged_in'=>true
                );

                $this->session->set_userdata($user_data);

                // $data['transactions'] = $this->wallet_model->get_transactions();
                // $data['sum'] = $this->wallet_model->get_sum($user_id);
                // $data['main_view'] = "wallet/index";

                // $this->load->view('layouts/main',$data);
                redirect('wallet/display_transaction/'.$this->session->userdata('user_id'));
            }
            else{
                $this->session->set_flashdata('login_failed', "Rentre des bonnes infal's bord's !");
                redirect('home/index');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home/index');
    }

    public function register()
    {
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');

        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'errors_register' => validation_errors("<p class='alert alert-danger'>","</p>")
            );
            $this->session->set_flashdata($data);
            $data['main_view'] = 'users/register_view';
            $this->load->view('layouts/main',$data);
        }
        else
        {
            if ($this->user_model->create_user()){
                $username = $this->input->post('username');
                $this->session->set_flashdata('register_username', "<p class='alert alert-success'> L'utilisateur <strong>".$username."</strong> a bien été créé </p>");
                $data['main_view'] = 'users/register_view';
                $this->load->view('layouts/main',$data);
            }
            else{
                $data['main_view'] = 'register_view';
                $this->load->view('layouts/main',$data);
            }
        }
    }
}

?>