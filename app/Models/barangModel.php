<?php

namespace App\Models;

use CodeIgniter\Model;

class barangModel extends Model
{
    protected $table = 'barang';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getdatabrg()
    {
        return $this->builder->get()->getResultArray();
    }

    public function getrwyt()
    {
        return $this->db->table('riwayat_barang')->get()->getResultArray();
    }

    public function add($data)
    {
        // return $this->db->table('barang')->insert($data);
        $sql = "CALL insert_barang('" . $data['nama_table'] . "'," . $data['id_barang'] . ",'" . $data['nama_barang'] . "'," . $data['jumlah'] . "," . $data['harga'] . ")";
        return $this->db->query($sql);
    }

    public function hapus($nama_table, $id_barang)
    {
        // return $this->db->table('barang')->insert($data);
        $sql = "CALL delete_barang('" . $nama_table . "'," . $id_barang . ")";
        return $this->db->query($sql);
    }

    public function edit($data)
    {
        // return $this->db->table('barang')->insert($data);
        $sql = "CALL update_barang('" . $data['nama_table'] . "'," . $data['id_barang'] . ",'" . $data['nama_barang'] . "'," . $data['jumlah'] . "," . $data['harga'] . ")";
        return $this->db->query($sql);
    }

    public function diskon($jumlah, $harga)
    {
        // return $this->db->table('barang')->insert($data);

        $sql = "SELECT diskon('" . $jumlah . "'," . $harga . ") as diskon";
        return $diskon = $this->db->query($sql);
    }
}
