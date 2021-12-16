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


        echo view('komik/detail', $data);
    }



    public function create()
    {
        $data = [
            'title' => "Form Tambah Data Komik"
        ];
        return view('komik/create', $data);
    }
}
