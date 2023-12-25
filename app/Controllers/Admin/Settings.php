<?php

namespace App\Controllers\Admin;
use App\Models\SettingsModel;

class Settings extends AdminController {

    public function index() {
        $model = new SettingsModel();
        if ($this->request->getPost()) {
            $post = $this->request->getPost();
            $model->updateSettings($post);
            $this->session->setFlashdata('success','Settings are updated successfully');
            return redirect()->to(base_url().'/admin/settings');
        }
        $data['site_settings'] = $model->findBySections('site');
        return view('admin/settings/index',$data);
    }

    public function findById($id) {
        $model = new SettingsModel();
        if(is_numeric($id)) {
            return $model->find($id);
        }
        throw new \Exception("Something went wrong!");
    }
    

}
