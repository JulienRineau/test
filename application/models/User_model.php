<?php

class User_model extends CI_Model 
{

    public function get_users($user_id)
    {
        //Echo user info
        // $this->db->where('id',$user_id);
        $this->db->where
        ([
            'user_id' => $user_id,
        ]);
        $query = $this->db->get('users');
        return $query->row();

        //Echo  number of row whith manual query
        // $query = $this->db->query("SELECT * FROM users");
        // // $query = $this->db->get('users');
        // return $query->num_rows(); //this count the number of rows
    }

    public function get_all_users(){
        $query = $this->db->get('users');
        return $query->result();
    }

    public function create_user()
    {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'surns' => $this->input->post('surns'),
            'fams' => $this->input->post('fams'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'coin' => $this->input->post('coin'),
            'admin' => $this->input->post('admin'),
        );
        $insert_data = $this->db->insert('users',$data);
        return $insert_data;
    }

    public function update_user($data, $user_id)
    {
        $this->db->where('id',$user_id);
        $this->db->update('users',$data);
    }

    public function delete_user($user_id)
    {
        $this->db->where('id',$user_id);
        $this->db->delete('users');
    }

    public function login_user($username,$password)
    {
        $this->db->where('username',$username);
        $this->db->where('password',$password);

        $result = $this->db->get('users');

        if($result->num_rows() == 1)
        {
            return $result->row(0)->user_id;
        }
        else
        {
            return false;
        }
    }

    function random_password() 
    {
        $users = $this->get_all_users();
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ12345678901234567890';
        foreach($users as $users){
        $password = array(); 
        $alpha_length = strlen($alphabet) - 1; 
            for ($i = 0; $i < 6; $i++) 
            {
                $n = rand(0, $alpha_length);
                $password[] = $alphabet[$n];
            }
            $password = implode($password);
            $data = array(
                'password' => $password,
            );
            $this->db->where('user_id',$users->user_id);
            $this->db->update('users',$data);
        }
    }

    }

?>