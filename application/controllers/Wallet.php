<?php 

class Wallet extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('no_access','Deso, tu n\'est pas connecté ou pas autorisé à venir ici.');
            redirect('home/index');
        }
    }

    public function index() {
        // affcihe le classement dee tout le monde
        // $data['transactions'] = $this->wallet_model->get_user_transaction($user_id);

        // $data['main_view'] = 'wallet/transactions';
        // $this->load->view('layouts/main', $data);


    }

    public function display_transaction($user_id){
        // affiche les transaction d'un user particulier
        $data['transactions'] = $this->wallet_model->get_user_transaction($user_id);
        $data['value'] = $this->wallet_model->get_sum($user_id);

        $data['main_view'] = 'wallet/transactions_view';
        $this->load->view('layouts/main', $data);
    }

    public function display_all_transactions(){
        // affiche toutes les transactions
        $data['transactions'] = $this->wallet_model->get_transactions();
        $data['main_view'] = "wallet/index";

        $this->load->view('layouts/main',$data);

    }

    public function display_ranking(){
        // affiche le rang des joueurs
        $this->db->order_by('coin', 'DESC');
        $data['users'] = $this->wallet_model->get_users();
        $data['main_view'] = "wallet/ranking_view";

        $this->load->view('layouts/main',$data);

    }

    public function create_transaction(){
        $this->form_validation->set_rules('username','Pseudo','trim|required|min_length[6]');
        $this->form_validation->set_rules('game','Jeu','required');
        $this->form_validation->set_rules('value','Gain','required');

        if($this->form_validation->run() == FALSE){
            $data = array(
                'errors_project' => validation_errors("<p class='alert alert-danger'>","</p>")
            );
            $this->session->set_flashdata($data);
            $data['main_view'] = 'wallet/create_transaction_view';
            $this->load->view('layouts/main',$data);
        }
        else{
            $player_id = $this->wallet_model->get_id($this->input->post('username'));
            if ($this->wallet_model->create_transaction($player_id->user_id)){
                $username = $this->input->post('username');
                $value = $this->input->post('value');
                $this->session->set_flashdata('create_transaction', "<p class='alert alert-success text-center'> L'utilisateur <strong>".$username."</strong> a reçu <strong>".$value."</strong> GZC </p>");
                $data['main_view'] = "wallet/create_transaction_view";
                $this->load->view('layouts/main', $data);
            }
            else{
                $data['main_view'] = 'wallet/create_transaction_view';
                $this->load->view('layouts/main',$data);
            }
        }
    }

    public function manage_admin(){
        $this->form_validation->set_rules('username','Pseudo','trim|required|min_length[3]');
        $this->form_validation->set_rules('admin','Project Description','required');

        if($this->form_validation->run() == FALSE){
            $data = array(
                'errors_project' => validation_errors("<p class='alert alert-danger'>","</p>")
            );
            $this->session->set_flashdata($data);
            $data['main_view'] = 'wallet/manage_admin_view';
            $this->load->view('layouts/main', $data);
        }
        else{
            $player_id = $this->wallet_model->get_id($this->input->post('username'));
            $admin = $this->input->post('admin');
            if ($this->wallet_model->manage_admin($player_id,$admin)){
                $username = $this->input->post('username');
                $this->session->set_flashdata('manage_admin', "<p class='alert alert-success'> Les droits de <strong>".$username."</strong> ont bien étés édité </p>");
                $data['main_view'] = 'wallet/manage_admin_view';
                $this->load->view('layouts/main',$data);
            }
            else{
                $data['main_view'] = 'wallet/manage_admin_view';
                $this->load->view('layouts/main',$data);
            }
        }
    }

    public function edit_transaction($project_id){
        $this->form_validation->set_rules('project_name','Project Name','trim|required|min_length[3]');
        $this->form_validation->set_rules('project_body','Project Description','trim|required|min_length[10]');

        if($this->form_validation->run() == FALSE){
            $data = array(
                'errors_project' => validation_errors("<p class='alert alert-danger'>","</p>")
            );
            $this->session->set_flashdata($data);
            $data['main_view'] = 'projects/edit_project';
            $data['project_data'] = $this->project_model->get_project($project_id);
            $this->load->view('layouts/main', $data);
        }
        else{
            if ($this->project_model->edit_project($project_id)){
                $project_name = $this->input->post('project_name');
                $this->session->set_flashdata('edit_project', "<p class='alert alert-success'> Le projet <strong>".$project_name."</strong> a bien été édité </p>");
                $data['main_view'] = 'projects/display';
                $data['project_data'] = $this->project_model->get_project($project_id);
                $this->load->view('layouts/main',$data);
            }
            else{
                $data['main_view'] = 'projects/display';
                $data['project_data'] = $this->project_model->get_project($project_id);
                $this->load->view('layouts/main',$data);
            }
        }
    }

    public function delete_transaction($project_id){
        if ($this->project_model->delete_project($project_id)){
            $project_name = $this->input->post('project_name');
            $this->session->set_flashdata('create_project', "<p class='alert alert-success'> Le projet a bien été supprimé </p>");
            $data['projects'] = $this->project_model->get_projects();
            $data['main_view'] = "projects/index";
            $this->load->view('layouts/main', $data);
        }
        else{
            $data['main_view'] = 'projects/display';
            $data['project_data'] = $this->project_model->get_project($project_id);
            $this->load->view('layouts/main',$data);
        }
    }

    public function initialisation(){
        // affiche les transaction d'un user particulier

        $data['main_view'] = 'wallet/initialisation_view';
        $this->load->view('layouts/main', $data);
    }

    public function everyone_get_gzc(){
        // affiche les transaction d'un user particulier

        $this->form_validation->set_rules('value','Montant','trim|required|min_length[1]');

        if($this->form_validation->run() == FALSE){
            $data = array(
                'errors' => validation_errors("<p class='alert alert-danger'>","</p>")
            );
            $this->session->set_flashdata($data);
            $data['main_view'] = 'wallet/initialisation_view';
            $this->load->view('layouts/main', $data);
        }
        else{
            $value = $this->input->post('value');
            if ($this->wallet_model->general_transaction($value)){
                $this->session->set_flashdata('everyone_get_gzc', "<p class='alert alert-success'> tous les joueurs on reçu <strong>".$value."</strong> GZC </p>");
                $data['main_view'] = 'wallet/initialisation_view';
                $this->load->view('layouts/main',$data);
            }
            else{
                $data['main_view'] = 'wallet/initialisation_view';
                $this->load->view('layouts/main',$data);
            }
        }
    }

    public function everyone_get_password(){
        // affiche les transaction d'un user particulier

        if ($this->user_model->random_password()){
            $this->session->set_flashdata('everyone_get_password', "<p class='alert alert-success'> Tout le monde à un nouveaux mot de passe </p>");
            $data['main_view'] = 'wallet/initialisation_view';
            $this->load->view('layouts/main',$data);
        }
        else{
            $data['main_view'] = 'wallet/initialisation_view';
            $this->load->view('layouts/main',$data);
        }
    }

    public function delete_all_transaction(){
        // affiche les transaction d'un user particulier

        if ($this->wallet_model->delete_transactions()){
            $this->session->set_flashdata('delete_all_transaction', "<p class='alert alert-success'> Tout les transactions on étées supprimées </p>");
            $data['main_view'] = 'wallet/initialisation_view';
            $this->load->view('layouts/main',$data);
        }
        else{
            $data['main_view'] = 'wallet/initialisation_view';
            $this->load->view('layouts/main',$data);
        }
    }

}



?>