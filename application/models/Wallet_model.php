<?php 
class Wallet_model extends CI_Model {

    public function get_transactions(){

        $this->db->select('*');
        $this->db->from('transactions');
        $this->db->join('users', 'transactions.user_id = users.user_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user_by_id($user_id){
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function get_users(){
        // renvois tous les utilisateurs
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_user_transaction($user_id){
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('transactions');
        return $query->result();
    }

    public function get_sum($user_id){
        $this->db->where('user_id',$user_id);
        $this->db->select_sum('value');
        $query = $this->db->get('transactions');
        return $query->row();
    }

    public function get_id($username){
        // return user id from his username
        $this->db->where('username',$username);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function create_transaction($user_id)
    {
        $data = array(
            'user_id' => $user_id,
            'admin_id' => $this->session->userdata('logged_in'),
            'game'=>$this->input->post('game'),
            'value'=>$this->input->post('value'),

        );
        $insert_data = $this->db->insert('transactions',$data);
        $data = array(
            'coin'=>$this->get_sum($user_id)->value,
        );
        $this->db->where('user_id',$user_id);
        $insert_data = $this->db->update('users',$data);
        return $insert_data;
    }

    public function manage_admin($player_id,$admin)
    {
        $data = array(
            'admin' => $admin,
        );
        $this->db->where('user_id',$player_id->user_id);
        $update_data = $this->db->update('users',$data);
        return $update_data;
    }
    public function delete_project($project_id)
    {
        $this->db->where('project_id',$project_id);
        $update_data = $this->db->delete('projects');
        return true;
    }

    public function get_all_transactions(){
        $query = $this->db->get('transactions');
        return $query->result();
    }

    function delete_transactions() 
    {
    //supprime toutes les transactions
        $transaction = $this->get_all_transactions();
        foreach($transaction as $transaction){
            $transaction_id = $transaction->transaction_id;
            $this->db->where('transaction_id',$transaction_id);
            $this->db->delete('transactions');
        }
    }

    function general_transaction($value) 
    {
    //Effectue  une transaction générale pour l'initialisation
    $users = $this->get_users();
    foreach($users as $users){
        $data = array(
            'user_id'=>$users->user_id,
            'admin_id'=>1,
            'game '=>'Initialisation',
            'value' => $value,
        );
        $insert_data = $this->db->insert('transactions',$data);
        }
        return $insert_data;
    }





}
?>