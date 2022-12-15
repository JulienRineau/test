<?php 
class Project_model extends CI_Model {

    public function get_projects(){

        $query = $this->db->get('projects');
        return $query->result();
    }

    public function get_project($project_id){
        $this->db->where('project_id',$project_id);
        $query = $this->db->get('projects');
        return $query->row();
    }

    public function create_project()
    {
        $data = array(
            'project_name' => $this->input->post('project_name'),
            'project_body' => $this->input->post('project_body'),
            'project_user_id'=>$this->input->post('project_user_id'),
        );
        $insert_data = $this->db->insert('projects',$data);
        return $insert_data;
    }

    public function edit_project($project_id)
    {
        $data = array(
            'project_name' => $this->input->post('project_name'),
            'project_body' => $this->input->post('project_body'),
        );
        $this->db->where('project_id',$project_id);
        $update_data = $this->db->update('projects',$data);
        return $update_data;
    }

    public function delete_project($project_id)
    {
        $this->db->where('project_id',$project_id);
        $update_data = $this->db->delete('projects');
        return true;
    }







}
?>