<?php

namespace App\Controllers\Admin;
use App\Models\FaqsModel;

class Faqs extends AdminController {

    public function index() {
        return view('admin/faqs/index');
    }
    
    public function table() {
        if($this->request->isAJAX()) {
            get_table_data('faqs');
        }
    }
    
    public function add() {

        $model = new FaqsModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            if($model->save($inset_data) === false) {
                return view('admin/faqs/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost()]);
            }
            return redirect()->to(base_url().'/admin/faqs');
        }
        $data['title'] = 'Add Faq';
        return view('admin/faqs/_form',$data);
    }
    
    public function edit($id) {
        $model = new FaqsModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            if($model->save($inset_data) === false) {
                return view('admin/faqs/_form', ['errors'=>$model->errors(), 'model'=>$this->request->getPost()]);
            }
            return redirect()->to(base_url().'/admin/faqs');
        }
        $data['model'] = $this->findById($id);
        $data['title'] = 'Edit - '.$id;
        return view('admin/faqs/_form',$data);
    }

    public function delete($id) {
        $model = new FaqsModel();
        
        $model->delete($id);
        return redirect()->to(base_url().'/admin/faqs');
    }
    
    public function findById($id) {
        $model = new FaqsModel();
        if(is_numeric($id)) {
            return $model->find($id);
        }
        throw new \Exception("Something went wrong!");
    }
    

}
