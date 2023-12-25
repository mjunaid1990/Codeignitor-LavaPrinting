<?php

namespace App\Controllers\Admin;
use App\Models\BannersModel;

class Mybanners extends AdminController {

    public function index() {
        return view('admin/banners/index');
    }
    
    public function table() {
        if($this->request->isAJAX()) {
            get_table_data('mybanners');
        }
    }
    
    public function add() {

        $model = new BannersModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            if($model->save($inset_data) === false) {
                return view('admin/banners/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost()]);
            }
            $insert_id = $model->getInsertID();
            if($insert_id) {
                handle_image_upload($insert_id, 'image', 'banners', '/uploads/banners/');
                handle_image_upload($insert_id, 'tablet_image', 'banners', '/uploads/banners/');
                handle_image_upload($insert_id, 'mobile_image', 'banners', '/uploads/banners/');
            }
            return redirect()->to(base_url().'/admin/mybanners');
        }
        $data['title'] = 'Add Banner';
        return view('admin/banners/_form',$data);
    }
    
    public function edit($id) {
        $model = new BannersModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            if($model->save($inset_data) === false) {
                return view('admin/banners/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost()]);
            }
            if($inset_data['id']) {
                $image = $this->request->getFile('image');
                if($image->isValid() && !$image->hasMoved()) {
                    $old = $this->findById($inset_data['id']);
                    $path = WRITEPATH . '/uploads/banners/' . $id . '/' . $old['image'];
                    if(file_exists($path)) {
                        unlink($path);
                    }
                }
                handle_image_upload($inset_data['id'], 'image', 'banners', '/uploads/banners/');
                
                $timage = $this->request->getFile('tablet_image');
                if($timage->isValid() && !$timage->hasMoved()) {
                    $told = $this->findById($inset_data['id']);
                    $tpath = WRITEPATH . '/uploads/banners/' . $id . '/' . $told['tablet_image'];
                    if(!empty($told['tablet_image']) && file_exists($tpath)) {
                        unlink($tpath);
                    }
                }
                
                handle_image_upload($inset_data['id'], 'tablet_image', 'banners', '/uploads/banners/');
                
                $mimage = $this->request->getFile('mobile_image');
                if($mimage->isValid() && !$mimage->hasMoved()) {
                    $mold = $this->findById($inset_data['id']);
                    $mpath = WRITEPATH . '/uploads/banners/' . $id . '/' . $mold['tablet_image'];
                    if(!empty($mold['tablet_image']) && file_exists($mpath)) {
                        unlink($mpath);
                    }
                }
                handle_image_upload($inset_data['id'], 'mobile_image', 'banners', '/uploads/banners/');
            }
            return redirect()->to(base_url().'/admin/mybanners');
        }
        
        $data['model'] = $this->findById($id);
        $data['title'] = 'Edit #'.$data['model']['id'];
        return view('admin/banners/_form',$data);
    }
    
    

    public function delete($id) {
        $model = $this->findById($id);
        $row = new BannersModel();
        if($model && !empty($model['image'])) {
            $path = WRITEPATH . '/uploads/banners/' . $id . '/' . $model['image'];
            if(file_exists($path)) {
                unlink($path);
            }
        }
        if($model && !empty($model['tablet_image'])) {
            $tpath = WRITEPATH . '/uploads/banners/' . $id . '/' . $model['tablet_image'];
            if(file_exists($tpath)) {
                unlink($tpath);
            }
        }
        if($model && !empty($model['mobile_image'])) {
            $mpath = WRITEPATH . '/uploads/banners/' . $id . '/' . $model['mobile_image'];
            if(file_exists($mpath)) {
                unlink($mpath);
            }
        }
        $row->delete($id);
        return redirect()->to(base_url().'/admin/mybanners');
    }
    
    public function findById($id) {
        $model = new BannersModel();
        if(is_numeric($id)) {
            return $model->find($id);
        }
        throw new \Exception("Something went wrong!");
    }
    

}
