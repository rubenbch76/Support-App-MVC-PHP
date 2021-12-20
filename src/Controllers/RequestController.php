<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\RequestModel;

class RequestController {

    public function __construct()
    {
        
        if(isset($_GET['action']) && $_GET['action'] == 'create')
        {
            $this->create();
            return;
        }

        if(isset($_GET['action']) && $_GET['action'] == 'store')
        {
            $this->store($_POST);
            return;
        }

        if(isset($_GET['action']) && $_GET['action'] == 'edit')
        {
            $id = $_GET['id_request'];
            $this->edit($id);
            return;
        }

        if(isset($_GET['action']) && $_GET['action'] == 'update')
        {
            $id = $_GET['id_request'];
            $data = $_POST;
            $this->update($id,$data);
        }

        $this->index();
    }

    public function index()
    {
        $data = RequestModel::all();
        return new View('home', $data);
    }

    public function create()
    {
        return new View('create');
    }

    public function store($data) : void
    {
        $request = new RequestModel($data['topic'],$data['description'],$data['user_name']);
        $request->save();
        $this->index();
    }

    public function edit($id)
    {
        $data = RequestModel::findById($id);
        return new View('edit', $data);
    }

    public function update($id,$data)
    {
        // Utilizando static method
        RequestModel::update($id,$data);
        $this->index();
        // Utilizando public method
        /* $request = new RequestModel($data['topic'],$data['description'],$data['user_name'],$id);
        $request->update(); */
    }

}