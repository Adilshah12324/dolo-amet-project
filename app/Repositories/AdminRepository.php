<?php

namespace App\Repositories;

use App\Models\Domain;
use App\Models\User;
use App\Repositories\Interfaces\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface {

    public function index()
    {
        $admins = User::with('domains')->where('role_id',2)->get();
     return view('super_admin.index',compact('admins'));
    }

    public function create()
    {
        $domains = Domain::all();
        return view('super_admin.create',compact('domains'));
    }

    public function store($request)
    {
        $adminData = new user();
        $adminData->name = $request->input('name');
        $adminData->role_id = 2;
        $adminData->email = $request->input('email');
        $adminData->password = $request->input('password');

        $adminData->save();

        $selectedUserIds = $request->input('domains');
        foreach ($selectedUserIds as $userId) {
            $adminData->domains()->attach($userId);
        }

        return redirect()->route('index.admin.superadmin')->with('success', 'Admin Added successfully');
    }

    public function edit($id)
    {
        $user =  User::find($id);
        $domains = Domain::all();
        $selectedDomains = $user->domains->pluck('id')->toArray();

        return view('super_admin.edit',compact('user','domains', 'selectedDomains'));

    }

    public function update($request, $id)
    {
        $adminData = User::find($id);
        $adminData->name = $request->input('name');
        $adminData->email = $request->input('email');
        $adminData->password = $request->input('password');

        $adminData->save();

        $selectedUserIds = $request->input('domains');
        foreach ($selectedUserIds as $userId) {
            $adminData->domains()->attach($userId);
        }

        return redirect()->route('index.admin.superadmin')->with('success', 'Admin Updated successfully');
    }

    public function destroy($id)
    {
        $adminData = User::find($id);
        $adminData->delete();

        return redirect()->route('index.admin.superadmin')->with('success', 'Admin deleted successfully');
    }

}
?>
