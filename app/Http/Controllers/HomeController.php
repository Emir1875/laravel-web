<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
class HomeController extends Controller
{
    //
}

public function index()
    {
        /* Cara */
        $data ['username'] ='Heroku';
        $data ['last_login'] =date('Y-m-d H:i:s');
        $data ['list_pendidikan']= ['SD','SMP','SMA','S1','S2','S3'];
        return view('home',$data);

        /* Cara 2 */
        $data=[
            'username'=>'Heroku',
            'last_login'=>date('Y-m-d H:i:s'),
            'list_pendidikan'=>['SD','SMP','SMA','S1','S2','S3']
        ];
        return view('home',$data);

        $username ='Heroku';
        $last_login =date('Y-m-d H:i:s');
        $list_pendidikan= ['SD','SMP','SMA','S1','S2','S3'];
        return view('home',compact('username','last_login','list_pendidikan'));
    }

