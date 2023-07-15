<?php

class User_Model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function save(){
        $data = array(
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        );
        if($this->db->insert('username', $data)){
            return array(
                'id' => $this->db->insert_id(),
                'success' => true,
                'message' => 'Data berhasil ditambah!'
            );
        }
    }

    public function update($id, $data){
        $data = array(
            'email' => $data->email
        );

        $this->db->where('id', $id);
        if($this->db->update('username', $data)){
            return array(
                'success' => true,
                'message' => 'Data berhasil diupdate!'
            );
        }
    }

    public function delete($id){

        $this->db->where('id', $id);
        if($this->db->delete('username')){
            return array(
                'success' => true,
                'message' => 'Data berhasil dihapus!'
            );
        }
    }

    public function get($where = null){
        if($where != null){
            return $this->db->get_where('username', $where)->row();
        }
        $query = $this->db->get('username');
        return $query->result();
    }
}