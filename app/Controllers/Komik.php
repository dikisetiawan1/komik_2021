<?php

namespace App\Controllers;

use App\Models\KomikModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use CodeIgniter\View\View;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {

        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        // $komik = $this->komikModel->findAll();
        $data = [

            'title' => 'Daftar komik',
            'komik' => $this->komikModel->getKomik()
        ];







        return view('komik/index', $data);
    }


    public function detail($slug)
    {
        $komik = $this->komikModel->getKomik($slug);
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        //jika komik tidak ada di tabel

        if (empty($data['komik'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Judul komik ' . $slug . ' tidak ditemukan.');
        }

        return view('komik/detail', $data);
    }



    public function create()
    {
        // session();
        $data = [
            'title' => "Form Tambah Data Komik",
            'validation' => \Config\Services::validation()
        ];
        return view('komik/create', $data);
    }
    public function save()
    {

        // validasi input
        if (!$this->validate([ //validasi bisa di custom menggunakan array
            'judul' => 'required|is_unique[komik.judul]',
            'penulis' => 'required[komik.penulis]',
            'penerbit' => 'required[komik.penerbit]',
            'sampul' => 'required[komik.sampul]'

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        return redirect()->to('/komik');
    }
}
