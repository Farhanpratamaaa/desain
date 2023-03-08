<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gambar_model extends CI_Model
{
	private $_table = 'gambar';

	public function insert($gambar) //simpan data gambar
	{
		$this->db->insert($this->_table, $gambar);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}
    public function delete($id_barang) //delete
    {
        return $this->db->delete($this->_table, array("id_barang" => $id_barang));
    }
	public function update($gambar) //update
	{
		if (!isset($gambar['id_gambar'])) {
			return;
		}

		return $this->db->update($this->_table, $gambar, ['id_gambar' => $gambar['id_gambar']]);
	}
	public function find($id_barang) //find
	{
		$query = $this->db->get_where($this->_table, array('id_barang' => $id_barang, 'utama'=> 1));
		return $query->row();
	}

	public function get_by_id($id_gambar)
	{
		$query = $this->db->get_where($this->_table, array('id_gambar' => $id_gambar));
		return $query;
	}
	public function get_by_idBarang($id_barang)
	{
		$query = $this->db->get_where($this->_table, array('id_barang' => $id_barang));
		return $query->result();
	}
	 
	public function getAll() //getall
	{
		$this->db->from($this->_table);
		$this->db->order_by("urutan", "asc");
		$query = $this->db->get();
		return $query->result();
		//fungsi diatas seperti halnya query 
		//select * from tb_barang order by id_barang desc
	}
	public function get_by_barang($id_barang)
	{
		$query = $this->db->get_where($this->_table, array('id_barang' => $id_barang, 'utama' => 0));
		return $query->result();
	}

	public function deleteByBarang($id_barang)
	{
		if (!$id_barang) {
			return;
		}
		return $this->db->delete($this->_table, ['id_barang' => $id_barang]);
	}
	function hapus_gambar($id)
	{
		$this->db->where('id_gambar', $id);
		$this->db->delete('gambar');
	}

	

}