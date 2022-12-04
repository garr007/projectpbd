<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\barangModel;

class barangController extends Controller
{
    public function __construct()
    {
        $this->model = new barangModel();
    }
    public function index()
    {

        $data = [
            'judul' => 'Data Barang',
            'barang' => $this->model->getdatabrg()
        ];
        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('Barang/index', $data);
        echo view('templates/v_footer');
    }

    public function add()
    {

        if (isset($_POST)) {
            $val = $this->validate([
                'id_barang' => [
                    'label' => 'ID Barang',
                    'rules' => 'required|numeric|is_unique[barang.id_barang]'
                ],
                'nama_barang' => [
                    'label' => 'Nama Barang',
                    'rules' => 'required'
                ],
                'jumlah' => [
                    'label' => 'Jumlah',
                    'rules' => 'required|numeric'
                ],
                'harga' => [
                    'label' => 'Harga',
                    'rules' => 'required|numeric'
                ],
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Data Barang',
                    'barang' => $this->model->getdatabrg()
                ];
                echo view('templates/v_header', $data);
                echo view('templates/v_sidebar');
                echo view('templates/v_topbar');
                echo view('Barang/index', $data);
                echo view('templates/v_footer');
            } else {

                $data = [
                    'nama_table' => 'barang',
                    'id_barang' => $this->request->getPost('id_barang'),
                    'nama_barang' => $this->request->getPost('nama_barang'),
                    'jumlah' => $this->request->getPost('jumlah'),
                    'harga' => $this->request->getPost('harga'),
                ];

                $success = $this->model->add($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to(base_url('Barang'));
                }
            }
        } else {
            return redirect()->to(base_url('Barang'));
        }
    }

    public function riwayat()
    {

        $data = [
            'judul' => 'Riwayat',
            'riwayat' => $this->model->getrwyt()
        ];
        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('riwayatBarang/index', $data);
        echo view('templates/v_footer');
    }

    public function hapus($id_barang)
    {
        $nama_table = 'barang';
        $success = $this->model->hapus($nama_table, $id_barang);
        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to(base_url('Barang'));
        }
    }

    public function edit()
    {

        if (isset($_POST)) {
            $val = $this->validate([
                // 'id_barang' => [
                //     'label' => 'ID Barang',
                //     'rules' => 'required|numeric|'
                // ],
                'nama_barang' => [
                    'label' => 'Nama Barang',
                    'rules' => 'required'
                ],
                'jumlah' => [
                    'label' => 'Jumlah',
                    'rules' => 'required|numeric'
                ],
                'harga' => [
                    'label' => 'Harga',
                    'rules' => 'required|numeric'
                ],
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Data Barang',
                    'barang' => $this->model->getdatabrg()
                ];
                echo view('templates/v_header', $data);
                echo view('templates/v_sidebar');
                echo view('templates/v_topbar');
                echo view('Barang/index', $data);
                echo view('templates/v_footer');
            } else {

                $data = [
                    'nama_table' => 'barang',
                    'id_barang' => $this->request->getPost('id_barang'),
                    'nama_barang' => $this->request->getPost('nama_barang'),
                    'jumlah' => $this->request->getPost('jumlah'),
                    'harga' => $this->request->getPost('harga'),
                ];

                $success = $this->model->edit($data);
                if ($success) {
                    session()->setFlashdata('message', 'Diubah');
                    return redirect()->to(base_url('Barang'));
                }
            }
        } else {
            return redirect()->to(base_url('Barang'));
        }
    }

    public function diskon($jumlah = 0, $harga = 0)
    {
        // $data = [
        //     'judul' => 'diskon',
        //     'nama_table' => 'barang',
        //     'id_barang' => $this->request->getPost('id_barang'),
        //     'nama_barang' => $this->request->getPost('nama_barang'),
        //     'jumlah' => $this->request->getPost('jumlah'),
        //     'harga' => $this->request->getPost('harga'),

        // ];


        $diskon = $this->model->diskon($jumlah, $harga);
        echo view('diskon/index', $diskon);
    }
}
