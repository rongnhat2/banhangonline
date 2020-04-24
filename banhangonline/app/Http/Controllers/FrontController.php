<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function trangchu(){
        return view('user.trangchu');
    }
    
    public function danhmuc(){
        return view('user.danhmuc');
    }
    
    public function danhmucsanpham(){
        return view('user.danhmucsanpham');
    }
    
    public function sanpham(){
        return view('user.sanpham');
    }
    
}
