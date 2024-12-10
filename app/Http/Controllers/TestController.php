<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return view('test');
    }

    public function home(){
        return view('home');
    }

    public function contact(){
        return view('contact.contact');
    }

    public function products(){
        return view('products.products');
    }

    public function about(){
        return view('about.about');
    }

    public function account(){
        return view('user.account');
    }

    // public function products(){
    //     return view('products.products');
    // }
}
