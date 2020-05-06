<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class FrontController extends Controller
{
    public function trangchu(){

        $categories = DB::table('category')->get();
        // dd($categories);
        return view('user.trangchu', compact('categories'));
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
    
    public function login(){
        $categories = DB::table('category')->get();
        return view('user.login', compact('categories'));
    }
    
    public function register(){
        $categories = DB::table('category')->get();
        return view('user.register', compact('categories'));
    }
    
}
