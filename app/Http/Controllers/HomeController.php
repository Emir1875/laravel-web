<?php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'username' => 'Heroku',
            'last_login' => date('Y-m-d H:i:s'),
            'list_pendidikan' => ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3']
        ];
        return view('home', $data);
    }
}
