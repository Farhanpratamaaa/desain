<?php
defined('BASEPATH') or exit ('no direct script acces allowed');
class User_model extends CI_Model
{
    private $_table = 'users'; //samain sama nama table database
    public function rules()
    {
        return [
            [
                'field' => 'username',  //samakan dengan atribute name pada tags input
                'label' => 'username',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nip',
                'label' => 'nip',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'level',
                'label' => 'level',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'status',
                'label' => 'status',
                'rules' => 'trim|required'
            ],
        ];
    }
    public function get_all() //Menampilkan list semua data users
    {
        $query = $this ->db->get_where($this->_table); //data diambil dari table users
        return $query->result();
    }
        public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    public function save(){
        {
            $data = array(
                "username" => $this->input->post('username'),
                "password" => $this->input->post('password'),
                "nip" => $this->input->post('nip'),
                "nama" => $this->input->post('nama'),
                "password" => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                "level" => $this->input->post('level'),
                "status" => $this->input->post('status')
            );
            return $this->db->insert($this->_table, $data);
        }
    
    }
    public function find($id_user)
	{
		if (!$id_user) {
			return;
		}

		$query = $this->db->get_where($this->_table, array('id_user' => $id_user));
		return $query->row();
	}


    function update_user($where, $data)
{
    $this->db->update('users', $data, $where);
    return $this->db->affected_rows();
}


    function update_admin($where, $data)
    {
        $this->db->update('users', $data, $where);
        return $this->db->affected_rows();
    }
   
    public function get_by_id($id)
    {
        $query = $this->db->get_where($this->_table, array('id_user' => $id));
        return $query->row();
    }
    public function update($data)
    {
        if (!isset($data['id_user'])) {
            return;
        }
        return $this->db->update($this->_table, $data, ['id_user' => $data['id_user']]);
    }
    public function verify($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get($this->_table);
        $user = $query->row();
        if (!password_verify($password, $user->password)) {
            return FALSE;
        }
        return true;
    }

   
}