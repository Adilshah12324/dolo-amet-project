<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Client\Request;

class AdminController extends Controller
{
    protected $adminRepositoryInterface;

    public function __construct(AdminRepositoryInterface $adminRepositoryInerface){
        $this->adminRepositoryInterface = $adminRepositoryInerface;
    }

    public function index(){

        return $this->adminRepositoryInterface->index();
    }

    public function create(){
        return $this->adminRepositoryInterface->create();
    }

    public function store(StoreAdminRequest $request){

        return $this->adminRepositoryInterface->store($request);
    }
    public function edit($id){
        return $this->adminRepositoryInterface->edit($id);
    }

    public function update(StoreAdminRequest $request,$id){
        return $this->adminRepositoryInterface->update($request, $id);
    }

    public function delete($id){
        return $this->adminRepositoryInterface->destroy($id);
    }
}
