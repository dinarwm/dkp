<?php

class Barang extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'barang';
		$this->primaryKey = 'id_barang';
	}

	public function all()
	{
		$data = $this->db->get($this->table);
		return $data;
	}


	public function get()
	{
		$data = $this->db->get($this->table);
		return $data->result();
	}

	public function getAll()
	{
		$data = $this->db->get($this->table);
		return $data->result();
	}

	public function first($term)
	{
		$data = $this->db->get_where($this->table,$term)->row();
		return $data;
	}

	public function getById($id_divisi)
	{
		$data = $this->db->get_where($this->table,$term);
		return $data;
	}

	public function find($id)
	{
		$data = $this->db->get_where($this->table,[$this->primaryKey => $id])->row();
		return $data;
	}

	public function create($data)
	{
		$result = $this->db->insert($this->table, $data);
		return $result;
	}

	public function update($term,  $data)
	{
		$result = $this->db->update($this->table, $data, $term);
		return $result;
	}

	public function delete($term)
	{
		$this->db->delete($this->table, $term);
		return;
	}

	public function truncate()
	{
		$this->db->truncate($this->table);
	}
	
}

/* End of file barang.php */