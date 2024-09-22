<?php

namespace App\Services;

class AbstractService
{
    protected $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }
    public function get($id){
        return $this->repo->findOrFail($id);
    }
    public function getAll(){
        return $this->repo->getAll();
    }
    public function show($id){
        return $this->repo->show($id);
    }
    public function store($data){

        // $data['created_by'] = app('auth_id');
        return $this->repo->create($data);
    }

    public function update($data,$item){

        // $data['updated_by']= app('auth_id');
        return $this->repo->update($data,$item);
    }
    public function getAllWith($key , $value)
    {
        return $this->repo->getAllWith($key , $value);
    }

    // public function getParent(){
    //     return $this->repo->getParent();
    // }
}