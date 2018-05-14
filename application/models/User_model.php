<?php

class User_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper("url");
    }

    public function register_user($user)
    {
        $this->db->insert('user', $user);

    }

    public function add_user($users)
    {
        $this->db->insert('user', $users);

    }

    public function get_users()
    {

        if ($query = $this->db->get('user')) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function login_user($email, $pass)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_email', $email);
        $this->db->where('user_password', $pass);
        if ($query = $this->db->get()) {
            return $query->row_array();

        } else {
            return false;
        }
    }

    public function email_check($email)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    //Lấy danh sách user
    public function show_users()
    {
        $query = $this->db->get('user');
        $query_result = $query->result();
        return $query_result;
    }

    // Load du lieu dua vao id
    public function show_user_id($data)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    // update vao csdl
    public function update_user_id($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $data);
    }

    //delete csdl Model
    public function delete($user_id,$user_image)
    {
        $this->load->database();
        $this->db->where('user_id', $user_id);
        unlink('user/upload/'.$user_image);
        $this->db->delete('user', array('user_id' => $user_id));
        return true;
    }

    //search data
    public function search($user_name)
    {
        $this->db->select('*');
        $this->db->like('user_name', $user_name);
        $this->db->from('user');
        $result = $this->db->get()->result_array();
        return $result;
    }
}


?>