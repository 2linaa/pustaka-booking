<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $AnggotaModel;
    public function __construct()
    {
        $this->AnggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Anggota',
            'anggota' => $this->AnggotaModel->getAnggota()
        ];
        return view('pages/anggota/index', $data);
    }

    public function detail($idanggota)
    {
        $data = [

            'title' => 'Detail Anggota',

            'anggota' => $this->AnggotaModel->getAnggota($idanggota)
        ];
        //jika komik tidak ada di tabel
        if (empty($data['anggota'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Anggota' . $idanggota . ' tidak ditemukan');
        }
        return view('pages/anggota/detail', $data);
    }
    // tambah
    public function create()
    {
        $data = [

            'title' => 'Form Tambah Anggota',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            // 'buku' => $this->BukuModel->getBuku($idbuku)
        ];
        return view('pages/anggota/create', $data);
    }

    public function store()
    {
        //validasi
        if (!$this->validate(
            [
                'nama' => 'required'
            ],

        )) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('/anggota/create')->withInput();
        }


        //simpan
        $this->AnggotaModel->save([

            'idanggota' => $this->request->getVar('idanggota'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp' => $this->request->getVar('telp'),

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/anggota');
        return redirect()->to('anggota');
    }
    // $img = $this->request->getFile('sampul');

    // if ($img->isValid() && !$img->hasMoved()) {
    //     $newName = $img->getRandomName();
    //     $img->move(WRITEPATH . 'uploads', $newName);

    //     session()->setFlashdata('success', 'Buku berhasil disimpan.');
    // } else {
    //     session()->setFlashdata('error', 'Gagal mengunggah gambar anggota.');
    // }

    // if (!$img->hasMoved()) {
    //     $filepath = WRITEPATH . 'uploads/' . $img->store();

    //     $data = ['uploaded_fileinfo' => new File($filepath)];
    //     // return view('upload_success', $data);
    // }

    // session()->setFlashdata('success', 'Buku berhasil disimpan.');


    public function destory($idanggota)
    {
        // dd($idanggota);
        $anggota = new AnggotaModel();
        $anggota->delete($idanggota);
        $data = [
            'title' => 'Detail Anggota',
            'anggota' => $this->AnggotaModel->getAnggota(),
        ];
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return view('pages/anggota/index', $data);
    }

    //edit
    public function edit($idanggota)
    {
        $data = [
            'title' => 'Form Ubah Data Anggota',
            'anggota' => $this->AnggotaModel->getAnggota($idanggota),
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),

        ];
        return view('pages/anggota/edit', $data);
    }

    public function update($idanggota)
    {
        if (!$this->validate([
            'nama' => 'required',
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('/anggota/edit/' . $this->request->getVar('id_anggota'))->withInput();
        }




        // Simpan data anggota yang diperbarui
        $this->AnggotaModel->update($idanggota, [
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp' => $this->request->getVar('telp'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/anggota'); // Redirect ke halaman edit atau sesuai kebutuhan Anda
    }
}
