<?php

namespace App\Controllers;

class Pelanggan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Pelanggan',
            'isi'   => 'v_home'
        ];

        return view('layouts/v_wrapper', $data);
    }
}
