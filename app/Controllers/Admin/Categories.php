<?php

namespace App\Controllers\Admin;
use App\Models\CategoriesModel;

class Categories extends AdminController {

    public function index() {
        $data['title'] = 'Categories';
        return view('admin/categories/index',$data);
    }
    
    public function table() {
        if($this->request->isAJAX()) {
            get_table_data('categories');
        }
    }
    
    public function add() {

        $model = new CategoriesModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            $inset_data['slug'] = to_slug($inset_data['name']);
            if($model->save($inset_data) === false) {
                return view('admin/categories/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost(), 'categories'=>$model->get()]);
            }
            return redirect()->to(base_url().'/admin/categories');
        }
        $data['categories'] = $model->get();
        $data['title'] = 'Add Category';
        return view('admin/categories/_form',$data);
    }
    
    public function edit($id) {
        $model = new CategoriesModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            if($model->save($inset_data) === false) {
                return view('admin/categories/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost(), 'categories'=>$model->get()]);
            }
            return redirect()->to(base_url().'/admin/categories');
        }
        $data['categories'] = $model->get();
        $data['model'] = $this->findById($id);
        $data['title'] = 'Edit - '.$id;
        return view('admin/categories/_form',$data);
    }

    public function delete($id) {
        $model = new CategoriesModel();
        $model->delete($id);
        return redirect()->to(base_url().'/admin/categories');
    }
    
    public function findById($id) {
        $model = new CategoriesModel();
        if(is_numeric($id)) {
            return $model->find($id);
        }
        throw new \Exception("Something went wrong!");
    }
    

}
