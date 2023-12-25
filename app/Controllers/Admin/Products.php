<?php

namespace App\Controllers\Admin;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;
use App\Models\ProductImagesModel;

class Products extends AdminController {

    public function index() {
        return view('admin/products/index');
    }
    
    public function table() {
        if($this->request->isAJAX()) {
            get_table_data('products');
        }
    }
    
    public function add() {

        $model = new ProductsModel();
        $categories = new CategoriesModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            if(empty($inset_data['slug'])) {
                $inset_data['slug'] = to_product_slug($inset_data['name']);
            }
            
            if($model->save($inset_data) === false) {
                return view('admin/products/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost(), 'categories'=>$categories->get()]);
            }
            $insert_id = $model->getInsertID();
            if($insert_id) {
                handle_image_upload($insert_id, 'featured_image', 'products');
                handle_multiple_upload($insert_id, 'files', 'product_images');
            }
            return redirect()->to(base_url().'/admin/products');
        }
        $data['title'] = 'Add Product';
        $data['categories'] = $categories->get();
        return view('admin/products/_form',$data);
    }
    
    public function edit($id) {
        $model = new ProductsModel();
        $categories = new CategoriesModel();
        $product_images = new ProductImagesModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            if($model->save($inset_data) === false) {
                return view('admin/products/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost(), 'pimages' => $product_images->findByProductId($inset_data['id'])]);
            }
            if($inset_data['id']) {
                $image = $this->request->getFile('featured_image');
                if($image->isValid() && !$image->hasMoved()) {
                    $old = $this->findById($inset_data['id']);
                    $path = WRITEPATH . '/uploads/' . $id . '/' . $old['featured_image'];
                    if(file_exists($path)) {
                        unlink($path);
                    }
                }
                handle_image_upload($inset_data['id'], 'featured_image', 'products');
                handle_multiple_upload($inset_data['id'], 'files', 'product_images');
            }
            return redirect()->to(base_url().'/admin/products');
        }
        
        $data['categories'] = $categories->get();
        $data['pimages'] = $product_images->findByProductId($id);
        $data['model'] = $this->findById($id);
        $data['title'] = 'Edit #'.$data['model']['id'];
        return view('admin/products/_form',$data);
    }
    
    public function remove($id, $product_id) {
        if(is_numeric($id)) {
            $product_images = new ProductImagesModel();
            $row = $product_images->find($id);
            if($row) {
                $path_ = WRITEPATH . '/uploads/products/' . $product_id . '/' . $row['image'];
                if(file_exists($path_)) {
                    unlink($path_);
                }
                $product_images->delete($id);
                return redirect()->to(base_url().'/admin/products/edit/'.$product_id); 
            }
        }
        return redirect()->to(base_url().'/admin/products/edit/'.$product_id); 
    }

    public function delete($id) {
        $model = $this->findById($id);
        $row = new ProductsModel();
        if($model && !empty($model['featured_image'])) {
            $path = WRITEPATH . '/uploads/' . $id . '/' . $model['featured_image'];
            $thumb = WRITEPATH . '/uploads/' . $id . '/thumb_' . $model['featured_image'];
            if(file_exists($path)) {
                unlink($path);
            }
            if(file_exists($thumb)) {
                unlink($thumb);
            }
            $product_images = new ProductImagesModel();
            $images = $product_images->findByProductId($id);
            if($images) {
                foreach ($images as $pimg) {
                    $path_ = WRITEPATH . '/uploads/products/' . $id . '/' . $pimg->image;
                    $thumb_ = WRITEPATH . '/uploads/products/' . $id . '/thumb_' . $pimg->image;
                    if(file_exists($path_)) {
                        unlink($path_);
                    }
                    if(file_exists($thumb_)) {
                        unlink($thumb_);
                    }
                    $product_images->delete($pimg->id);
                }
            }
        }
        $row->delete($id);
        return redirect()->to(base_url().'/admin/products');
    }
    
    public function findById($id) {
        $model = new ProductsModel();
        if(is_numeric($id)) {
            return $model->find($id);
        }
        throw new \Exception("Something went wrong!");
    }
    

}
