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

    
    public function products(){
        return view('products.products');
    }

    public function about(){
        return view('about.about');
    }

    public function account(){
        return view('user.account');
    }

    public function terms(){
        return view('terms.terms');
    }

    // public function products(){
    //     return view('products.products');
    // }

    public function faq() { 
        return view('faq.faq'); 
    }

    public function wishlist() { 
        return view('wishlist.wishlist'); 
    }
}
