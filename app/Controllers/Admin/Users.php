<?php

namespace App\Controllers\Admin;
use App\Models\UsersModel;

class Users extends AdminController {

    public function index() {
        return view('admin/users/index');
    }
    
    public function table() {
        if($this->request->isAJAX()) {
            get_table_data('users');
        }
    }
    
    public function table_customers() {
        if($this->request->isAJAX()) {
            get_table_data('customers');
        }
    }
    
    public function add() {
        $model = new UsersModel();
        if ($this->request->getPost()) {
            $insert_data = $this->request->getPost();
            $password = $insert_data['password'];
            $hasher = new \App\ThirdParty\PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
            $insert_data['password'] = $hasher->HashPassword($password);
            $insert_data['type'] = 2;
            $insert_data['password_string'] = $password;
            if ($model->save($insert_data) === false) {
                return view('admin/users/_form', ['errors' => $model->errors(), 'model' => $this->request->getPost()]);
            }
            $this->session->setFlashdata('success','Partner is added successfully');
            return redirect()->to(base_url().'/admin/users');
        }
        $data['title'] = 'Add Partner';
        return view('admin/users/_form',$data);
    }
    
    public function edit($id) {
        $model = new UsersModel();
        if ($this->request->getPost()) {
            $insert_data = $this->request->getPost();
            $password = $insert_data['new_password'];
            $hasher = new \App\ThirdParty\PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
            if(!empty($password)) {
                $insert_data['password'] = $hasher->HashPassword($password);
                $insert_data['password_string'] = $password;
            }
            if ($model->save($insert_data) === false) {
                return view('admin/users/_form', ['errors' => $model->errors(), 'model' => $this->request->getPost()]);
            }
            $this->session->setFlashdata('success','Partner updated successfully');
            return redirect()->to(base_url().'/admin/users');
        }
        $data['model'] = $this->findById($id);
        $data['title'] = 'Update - '.$data['model']['id'];
        return view('admin/users/_form',$data);
    }
    
    public function delete($id) {
        if($this->current_user->type == 1) {
            $model = new UsersModel();
            $model->delete($id);
            $this->session->setFlashdata('success','Partner is deleted successfully');
        }
        return redirect()->to(base_url().'/admin/users');
    }
    

    public function findById($id) {
        $model = new UsersModel();
        if(is_numeric($id)) {
            return $model->find($id);
        }
        throw new \Exception("Something went wrong!");
    }

}
