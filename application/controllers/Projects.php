<?php 

class Projects extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('no_access','Deso, tu n\'est pas connecté ou pas autorisé à aller ici.');
            redirect('home/index');
        }
    }

    public function index() {

        $data['projects'] = $this->project_model->get_projects();

        $data['main_view'] = "projects/index";
        $this->load->view('layouts/main', $data);

    }

    public function display($project_id){

        $data['project_data'] = $this->project_model->get_project($project_id);

        $data['main_view'] = 'projects/display';
        $this->load->view('layouts/main', $data);
    }

    public function create(){
        $this->form_validation->set_rules('project_name','Project Name','trim|required|min_length[3]');
        $this->form_validation->set_rules('project_body','Project Description','trim|required|min_length[10]');

        if($this->form_validation->run() == FALSE){
            $data = array(
                'errors_project' => validation_errors("<p class='alert alert-danger'>","</p>")
            );
            $this->session->set_flashdata($data);
            $data['main_view'] = 'projects/create_project';
            $this->load->view('layouts/main',$data);
        }
        else{
            if ($this->project_model->create_project()){
                $project_name = $this->input->post('project_name');
                $this->session->set_flashdata('create_project', "<p class='alert alert-success'> Le projet <strong>".$project_name."</strong> a bien été créé </p>");
                $data['projects'] = $this->project_model->get_projects();
                $data['main_view'] = "projects/index";
                $this->load->view('layouts/main', $data);
            }
            else{
                $data['main_view'] = 'projects/create_project';
                $this->load->view('layouts/main',$data);
            }
        }
    }

    public function edit($project_id){
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

    public function delete($project_id){
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

}


?>