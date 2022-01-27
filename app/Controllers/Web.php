<?php

namespace App\Controllers;

class Web extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Web',
        ];

        return view('v_web', $data);
    }
}
