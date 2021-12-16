<?php

namespace App\Controllers;

class Pages extends BaseController
{

    public function index(){
        $data = [
            'title' => 'Home | CI4'
        ];
       
        return view('pages/home',$data);
        
    }

    public function about(){
    $data = [
        'title' => 'About Me'
    ];

    return view('pages/about',$data);
    
    }

    public function contact(){
    $data = [
    'title' => 'Contact Us',
    'alamat' => [
        [
        'tipe' => 'Rumah',
        'alamat' => 'Jl. pebayuran',
        'telp' => '085777613572',
        'kota'=> 'bekasi'
    ],
    [
        'tipe'=> 'Kantor',
        'alamat'=> 'jl. kertabumi',
        'telp'=> '026 6579 876',
        'kota'=> 'karawang'
    ]
    ]
    ];

    return view('pages/contact',$data);

    }   



}