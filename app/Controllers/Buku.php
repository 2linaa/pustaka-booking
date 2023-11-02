<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $BukuModel;
    public function __construct()
    {
        $this->BukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->BukuModel->getBuku()
        ];
        return view('pages/buku/index', $data);
    }

    public function detail($idbuku)
    {
        $data = [

            'title' => 'Detail Buku',

            'buku' => $this->BukuModel->getBuku($idbuku)
        ];
        //jika komik tidak ada di tabel
        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul buku ' . $idbuku . ' tidak ditemukan');
        }
        return view('pages/buku/detail', $data);
    }


    // tambah
    public function create()
    {
        session();
        $data = [

            'title' => 'Form Tambah Buku',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            // 'buku' => $this->BukuModel->getBuku($idbuku)
        ];
        return view('pages/buku/create', $data);
    }

    public function store()
    {
        session();
        //validasi
        if (!$this->validate(
            [
                'judul' => 'required[buku.judul]',
                
            ],

        )) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('/buku/create')->withInput();
        }


        //simpan
        $filesampul = $this->request->getFile('sampul');
        $filesampul->move('img');
        $nmsampul = $filesampul->getName();
        $this->BukuModel->save([

            'idbuku' => $this->request->getVar('idbuku'),
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'sampul' => $nmsampul,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/buku');
    }

    public function destory($idbuku)
    {
        // dd($idbuku);
        $buku = new BukuModel();
        $buku->delete($idbuku);
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->BukuModel->getBuku(),
        ];
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return view('pages/buku/index', $data);
    }

    public function edit($idbuku)
    {
        $data = [

            'title' => 'Form Ubah Data Buku',
            'buku' => $this->BukuModel->getBuku($idbuku),
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),

        ];
        return view('pages/buku/edit', $data);
    }

    public function update($idbuku)
    {
        //validasi
        if (!$this->validate(
            [
                'judul' => 'required'
            ],

        )) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('/buku/edit/' . $this->request->getVar('id_buku'))->withInput();
        }

        


        // Cek apakah pengguna mengunggah ulang file sampul
        $filesampul = $this->request->getFile('sampul');

        if ($filesampul->isValid() && !$filesampul->hasMoved()) {
            // Jika ada file baru diunggah, pindahkan file baru dan simpan nama file yang baru di database
            $filesampul->move('img');
            $nmsampul = $filesampul->getName();
        } else {
            // Jika tidak ada file baru diunggah, gunakan nama file sampul yang sudah ada dalam database
            $buku = $this->BukuModel->getBuku($idbuku);
            $nmsampul = $buku['sampul'];
        }

        // Simpan data buku yang diperbarui
        $this->BukuModel->update($idbuku, [
            'judul' => $this->request->getVar('judul'),
            'pengarang' => $this->request->getVar('pengarang'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'sampul' => $nmsampul, // Menggunakan nama file yang baru atau yang sudah ada
        ]);



        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/buku'); // Redirect ke halaman edit atau sesuai kebutuhan Anda
    }
}
