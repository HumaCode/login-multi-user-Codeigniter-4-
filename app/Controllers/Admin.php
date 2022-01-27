<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Admin',
            'isi'   => 'v_home'
        ];

        return view('layouts/v_wrapper', $data);
    }
}
