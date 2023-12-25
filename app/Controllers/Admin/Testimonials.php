<?php

namespace App\Controllers\Admin;
use App\Models\TestimonialsModel;

class Testimonials extends AdminController {

    public function index() {
        return view('admin/testimonials/index');
    }
    
    public function table() {
        if($this->request->isAJAX()) {
            get_table_data('testimonials');
        }
    }
    
    public function add() {

        $model = new TestimonialsModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            if($model->save($inset_data) === false) {
                return view('admin/testimonials/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost()]);
            }
            $insert_id = $model->getInsertID();
            if($insert_id) {
                handle_image_upload($insert_id, 'image', 'testimonials', '/uploads/testimonials/');
            }
            return redirect()->to(base_url().'/admin/testimonials');
        }
        $data['title'] = 'Add Testimonial';
        return view('admin/testimonials/_form',$data);
    }
    
    public function edit($id) {
        $model = new TestimonialsModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            if($model->save($inset_data) === false) {
                return view('admin/testimonials/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost()]);
            }
            $image = $this->request->getFile('image');
            if($image && $image->isValid() && !$image->hasMoved()) {
                $old = $this->findById($inset_data['id']);
                $path = WRITEPATH . '/uploads/testimonials/' . $id . '/' . $old['image'];
                if(file_exists($path)) {
                    unlink($path);
                }
            }
            handle_image_upload($inset_data['id'], 'image', 'testimonials', '/uploads/testimonials/');
            return redirect()->to(base_url().'/admin/testimonials');
        }
        $data['model'] = $this->findById($id);
        $data['title'] = 'Edit - '.$id;
        return view('admin/testimonials/_form',$data);
    }

    public function delete($id) {
        $model = new TestimonialsModel();
        $row = $this->findById($id);
        if($row && !empty($row['image'])) {
            $path = WRITEPATH . '/uploads/testimonials/' . $id . '/' . $row['image'];
            if(file_exists($path)) {
                unlink($path);
            }
        }
        $model->delete($id);
        return redirect()->to(base_url().'/admin/testimonials');
    }
    
    public function findById($id) {
        $model = new TestimonialsModel();
        if(is_numeric($id)) {
            return $model->find($id);
        }
        throw new \Exception("Something went wrong!");
    }
    

}
