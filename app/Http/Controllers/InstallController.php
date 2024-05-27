<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallController extends Controller
{
    public function index()
    {
        return view('install.index');
    }

    public function requirements()
    {
        $extensions = ['BCMath', 'Ctype', 'Fileinfo', 'JSON', 'Mbstring', 'OpenSSL', 'PDO', 'pdo_mysql', 'Tokenizer', 'XML', 'cURL', 'GD'];
        $phpversion = version_compare(PHP_VERSION, '8.1', '>=');
        return view('install.requirements', compact('extensions', 'phpversion'));
    }

    public function permissions()
    {
        $folders = [
            '/bootstrap/cache',
            '/storage',
            '/storage/app',
            '/storage/logs'
        ];

        return view('install.permissions', compact('folders'));
    }
}
