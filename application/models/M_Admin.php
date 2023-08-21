<?php if (!defined('BASEPATH')) exit('No direct script acess allowed');

class M_Admin extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function get_table($table_name)
  {
    $get_user = $this->db->get($table_name);
    return $get_user->result_array();
  }

  function get_table_maps($table_name)
  {
    $get_user = $this->db->get($table_name);
    return $get_user->result();
  }

  function get_tableid($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $edit = $this->db->get($table_name);
    return $edit->result_array();
  }

  function get_tableid_edit($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $edit = $this->db->get($table_name);
    return $edit->row();
  }

  function add_multiple($table, $data = array())
  {
    $total_array = count($data);

    if ($total_array != 0) {
      $this->db->insert_batch($table, $data);
    }
  }

  function insertTable($table_name, $data)
  {
    $tambah = $this->db->insert($table_name, $data);
    return $tambah;
  }

  function LastinsertId($table_name, $data)
  {
    $this->db->insert($table_name, $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  function update_table($table_name, $where, $id, $data)
  {
    $this->db->where($where, $id);
    $update = $this->db->update($table_name, $data);
    return $update;
  }

  function delete_table($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $hapus = $this->db->delete($table_name);
    return $hapus;
  }

  function delete_table_multiple($table_name, $where, $id)
  {
    if (!empty($id)) {
      $this->db->where_in($where, $id);
      $hapus = $this->db->delete($table_name);
      return $hapus;
    }
  }

  function edit_table($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $edit = $this->db->get($table_name);
    return $edit->row();
  }

  function CountTable($table_name)
  {
    $Count = $this->db->get($table_name);
    return $Count->num_rows();
  }

  function CountTableId($table_name, $where, $id)
  {
    $this->db->where($where, $id);
    $Count = $this->db->get($table_name);
    return $Count->num_rows();
  }

  function SelectTable($table_name, $query, $id, $orderby)
  {
    $this->db->select($query, FALSE); // select('RIGHT(user.id_odojers,4) as kode', FALSE);
    $this->db->order_by($id, $orderby);
    $query = $this->db->get($table_name); // cek dulu apakah ada sudah ada kode di tabel.
    return $query;
  }

  function SelectTableSQL($query)
  {
    $row = $this->db->query($query);
    return $row;
  }

  function get_user($user)
  {
    $this->db->where('id_login', $user);
    $get_user = $this->db->get('tbl_login');
    return $get_user->row();
  }

  public function get_keyword($keyword)
  {
    $this->db->select('*');
    $this->db->from('tbl_unit');
    $this->db->like('nama_unit', $keyword);
    return $this->db->get()->result();
  }
}
