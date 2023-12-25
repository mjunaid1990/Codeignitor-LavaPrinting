<?php

namespace App\Controllers\Admin;
use App\Models\QuotesModel;

class Quotes extends AdminController {

    public function index() {
        return view('admin/quotes/index');
    }
    
    public function table() {
        if($this->request->isAJAX()) {
            get_table_data('quotes');
        }
    }
    
    public function view($id) {
        $data['model'] = $this->findById($id);
        $data['title'] = 'View #'.$data['model']['id'];
        return view('admin/quotes/view', $data);
    }
    
    
    public function findById($id) {
        $model = new QuotesModel();
        if(is_numeric($id)) {
            return $model->find($id);
        }
        throw new \Exception("Something went wrong!");
    }
    

}
