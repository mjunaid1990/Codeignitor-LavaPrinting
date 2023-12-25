<?php

namespace App\Controllers\Admin;
use App\Models\BlogsModel;

class Blogs extends AdminController {

    public function index() {
        return view('admin/blogs/index');
    }
    
    public function table() {
        if($this->request->isAJAX()) {
            get_table_data('blogs');
        }
    }
    
    public function add() {

        $model = new BlogsModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            $inset_data['slug'] = to_slug($inset_data['name']);
            if($model->save($inset_data) === false) {
                return view('admin/blogs/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost()]);
            }
            $insert_id = $model->getInsertID();
            if($insert_id) {
                handle_image_upload($insert_id, 'image', 'blogs', '/uploads/blogs/');
            }
            return redirect()->to(base_url().'/admin/blogs');
        }
        $data['title'] = 'Add Blog';
        return view('admin/blogs/_form',$data);
    }
    
    public function edit($id) {
        $model = new BlogsModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            if($model->save($inset_data) === false) {
                return view('admin/blogs/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost()]);
            }
            $image = $this->request->getFile('image');
            if($image && $image->isValid() && !$image->hasMoved()) {
                $old = $this->findById($inset_data['id']);
                $path = WRITEPATH . '/uploads/blogs/' . $id . '/' . $old['image'];
                if(file_exists($path)) {
                    unlink($path);
                }
            }
            handle_image_upload($inset_data['id'], 'image', 'blogs', '/uploads/blogs/');
            return redirect()->to(base_url().'/admin/blogs');
        }
        $data['model'] = $this->findById($id);
        $data['title'] = 'Edit - '.$id;
        return view('admin/blogs/_form',$data);
    }

    public function delete($id) {
        $model = new BlogsModel();
        $row = $this->findById($id);
        if($row && !empty($row['image'])) {
            $path = WRITEPATH . '/uploads/blogs/' . $id . '/' . $row['image'];
            if(file_exists($path)) {
                unlink($path);
            }
        }
        $model->delete($id);
        return redirect()->to(base_url().'/admin/blogs');
    }
    
    public function findById($id) {
        $model = new BlogsModel();
        if(is_numeric($id)) {
            return $model->find($id);
        }
        throw new \Exception("Something went wrong!");
    }
    

}
