<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman User',
            'isi'   => 'v_home'
        ];

        return view('layouts/v_wrapper', $data);
    }
}
