<?php

namespace Config;

use App\Filters\FilterAdmin;
use App\Filters\FilterPelanggan;
use App\Filters\FilterUser;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'                  => CSRF::class,
        'toolbar'               => DebugToolbar::class,
        'honeypot'              => Honeypot::class,
        'invalidchars'          => InvalidChars::class,
        'secureheaders'         => SecureHeaders::class,
        'filteradmin'           => FilterAdmin::class,
        'filteruser'            => FilterUser::class,
        'filterpelanggan'       => FilterPelanggan::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'filteradmin' => ['except' => [
                'auth', 'auth/*',
                'web', 'web/*',
                '/'
            ]],
            'filteruser' => ['except' => [
                'auth', 'auth/*',
                'web', 'web/*',
                '/'
            ]],
            'filterpelanggan' => ['except' => [
                'auth', 'auth/*',
                'web', 'web/*',
                '/'
            ]],
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'filteradmin' => ['except' => [
                'home', 'home/*',
                'admin', 'admin/*',
            ]],
            'filteruser' => ['except' => [
                'home', 'home/*',
                'user', 'user/*',
            ]],
            'filterpelanggan' => ['except' => [
                'home', 'home/*',
                'pelanggan', 'pelanggan/*',
            ]],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
