<?php

namespace App\Controllers\Admin;
use App\Models\UsersModel;

class Profile extends AdminController {

    
    
    public function index() {

        $model = new UsersModel();
        if ($this->request->getPost()) {
            $inset_data = $this->request->getPost();
            $inset_data['updated_at'] = date('Y-m-d h:i:s');
            $password = $inset_data['new_password'];

            if(!empty($password)) {
                $hasher = new \App\ThirdParty\PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
                $inset_data['password'] = $hasher->HashPassword($password);
                $inset_data['password_string'] = $inset_data['new_password'];
            }

            if($model->save($inset_data) === false) {
                return view('admin/users/profile', ['errors'=>$model->errors(), 'model'=>$this->request->getPost()]);
            }
            $this->session->setFlashdata('success','Profile is updated successfully');
            return redirect()->to(base_url().'/admin/profile');
        }
        $data['model'] = $this->findById($this->current_user->id);
        $data['title'] = 'Update Profile';
        return view('admin/users/profile',$data);
    }

    public function findById($id) {
        $model = new UsersModel();
        if(is_numeric($id)) {
            return $model->find($id);
        }
        throw new \Exception("Something went wrong!");
    }

}
