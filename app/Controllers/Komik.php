<?php

namespace App\Controllers;

use App\Models\KomikModel;

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







return view('komik/index',$data);

 }


 public function detail($slug)
{
 $komik = $this->komikModel->getKomik($slug);
 $data =[
     'title' =>'Detail Komik',
     'komik' => $this->komikModel->getKomik($slug)
 ];


 return view('komik/detail', $data);
}


}