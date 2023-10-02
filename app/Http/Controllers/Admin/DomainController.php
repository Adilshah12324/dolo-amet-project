<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;

class DomainController extends Controller
{
    public function index(){
        $admin = auth()->user();
        $domains = $admin->domains;

        return view('admin.domain.index',compact('domains'));
    }

    public function domainName($domain){

        $admin = auth()->user();
        $domains = $admin->domains;
        return view('admin.domain.all',compact('domain','domains'));
    }
}
