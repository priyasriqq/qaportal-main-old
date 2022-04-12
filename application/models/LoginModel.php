<?php
class LoginModel extends CI_Model {
    public function getUserData($email) {
        //query the table 'users' and get the result count
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function getPassword($email)
    {
      $this->db->where('email', $email);
      $query = $this->db->get('users');
      return $query->row()->password;
    }
}
