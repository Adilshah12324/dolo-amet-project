<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDomainRequest;
use App\Models\Domain;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain::all();
        return view('super_admin.domain.index',compact('domains'));
        
    }

    public function create()
    {
        return view('super_admin.domain.create');
        # code...
    }

    public function store(StoreDomainRequest $request){
        Domain::Create($request->all());

        return redirect()->back();
        
    }

    public function edit($id)
    {
        $domain = Domain::find($id);

        return view('super_admin.domain.edit',compact('domain'));
        # code...
    }

    public function update(StoreDomainRequest $request, $id)
    {
        $domain = Domain::find($id);
        $domain->name = $request->input('name');
        $domain->update();
       
        return redirect()->route('index.domain.superadmin');
        # code...
    }

    public function delete($id)
    {
        $domain = Domain::find($id);
        $domain->delete();

        return redirect()->route('index.domain.superadmin');
    }
}
