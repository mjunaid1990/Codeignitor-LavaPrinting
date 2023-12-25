<?php

namespace App\Controllers\Admin;
use App\Models\PagesModel;

class Pages extends AdminController {

    public function index() {
        return view('admin/pages/index');
    }
    
    public function table() {
        if($this->request->isAJAX()) {
            get_table_data('pages');
        }
    }
    
    public function add() {

        $model = new PagesModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            $inset_data['slug'] = to_slug($inset_data['name']);
            if($model->save($inset_data) === false) {
                return view('admin/pages/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost()]);
            }
            $insert_id = $model->getInsertID();
            if($insert_id) {
                handle_image_upload($insert_id, 'image', 'pages', '/uploads/pages/');
            }
            return redirect()->to(base_url().'/admin/pages');
        }
        $data['title'] = 'Add Page';
        return view('admin/pages/_form',$data);
    }
    
    public function edit($id) {
        $model = new PagesModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            if($model->save($inset_data) === false) {
                return view('admin/pages/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost()]);
            }
            $image = $this->request->getFile('image');
            if($image && $image->isValid() && !$image->hasMoved()) {
                $old = $this->findById($inset_data['id']);
                $path = WRITEPATH . '/uploads/pages/' . $id . '/' . $old['image'];
                if(file_exists($path)) {
                    unlink($path);
                }
            }
            handle_image_upload($inset_data['id'], 'image', 'pages', '/uploads/pages/');
            return redirect()->to(base_url().'/admin/pages');
        }
        $data['model'] = $this->findById($id);
        $data['title'] = 'Edit - '.$id;
        return view('admin/pages/_form',$data);
    }

    public function delete($id) {
        $model = new PagesModel();
        $row = $this->findById($id);
        if($row && !empty($row['image'])) {
            $path = WRITEPATH . '/uploads/pages/' . $id . '/' . $row['image'];
            if(file_exists($path)) {
                unlink($path);
            }
        }
        $model->delete($id);
        return redirect()->to(base_url().'/admin/pages');
    }
    
    public function findById($id) {
        $model = new PagesModel();
        if(is_numeric($id)) {
            return $model->find($id);
        }
        throw new \Exception("Something went wrong!");
    }
    

}
