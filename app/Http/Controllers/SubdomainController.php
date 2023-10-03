<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubdomainController extends Controller
{
    public function index()
    {
        // $admin = auth()->user();
        // $domains = $admin->domains;
        return view('admin.domain.all');
        // return "welcome to admin panel";
        # code...
    }
    // public function domainName($domain){

    //     $admin = auth()->user();
    //     $domains = $admin->domains;
    //     return view('admin.domain.all',compact('domain','domains'));
    // }
    //
}
