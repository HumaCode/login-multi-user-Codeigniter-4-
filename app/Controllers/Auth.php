<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'validation' => \Config\Services::validation()
        ];

        return view('v_register', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];

        return view('v_login', $data);
    }

    public function simpanRegister()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!'
                ]
            ],
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!',
                    'is_unique' => '{field} sudah digunakan user lain.!!'
                ]
            ],
            'no_hp' => [
                'label' => 'No. Handphone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]|matches[password2]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!',
                    'min_length' => '{field} harus 8 karakter.!!',
                    'matches' => '{field} tidak sama.!!',
                ]
            ],
            'password2' => [
                'label' => 'Ulangi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!',
                    'matches' => '{field} tidak sama.!!',
                ]
            ],
        ])) {
            $data = [
                'nama_user' => htmlspecialchars($this->request->getPost('nama_user')),
                'email' => htmlspecialchars($this->request->getPost('email')),
                'no_hp' => htmlspecialchars($this->request->getPost('no_hp')),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'level' => 3,
                'foto' => 'default.png',
            ];

            $this->ModelAuth->simpanRegister($data);

            session()->setFlashdata('pesan', 'Akun berhasil dibuat..');
            return redirect()->to('auth/register');
        } else {
            return redirect()->to('auth/register')->withInput();
        }
    }

    public function cekLogin()
    {
        // validasi
        if ($this->validate([
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong.!!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!',
                    'min_length' => '{field} minimal 8 karakter.!!',
                ],
            ]
        ])) {
            // jika valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $cek_login = $this->ModelAuth->login($email);

            if ($cek_login) {
                // buat session
                if (password_verify($password, $cek_login['password'])) {
                    session()->set('log', true);
                    session()->set('id_user', $cek_login['id_user']);
                    session()->set('nama_user', $cek_login['nama_user']);
                    session()->set('email', $cek_login['email']);
                    session()->set('no_hp', $cek_login['no_hp']);
                    session()->set('foto', $cek_login['foto']);
                    session()->set('level', $cek_login['level']);

                    return redirect()->to('home');
                } else {
                    session()->setFlashdata('p', 'Email atau Password Salah.!!');
                    return redirect()->to('auth/login');
                }
            } else {
                session()->setFlashdata('p', 'Email atau Password Salah.!!');
                return redirect()->to('auth/login');
            }
        } else {
            return redirect()->to('auth/login')->withInput();
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('id_user');
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('no_hp');
        session()->remove('foto');
        session()->remove('level');

        session()->setFlashdata('pesan', 'Anda berhasil logout..');
        return redirect()->to('auth/login');
    }
}
