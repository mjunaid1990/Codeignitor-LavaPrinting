<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\LoginModel;
use App\Models\ForgetPasswordModel;
use App\Models\ResetPasswordModel;

class Auth extends AuthController {

    public function Login() {
        
        if ($this->isloggedin) {
            return redirect()->to(base_url() . '/admin');
        }
        $model = new LoginModel();
        if ($this->request->getPost()) {
            $insert_data = $this->request->getPost();
            $check = $model->auth_check($insert_data);


            if ($check) {
                $user = array('current_user' => $check, 'loggedin' => true);
                $this->session->set($user);
                return redirect()->to(base_url() . '/admin');
            } else {
                return view('login', ['errors' => ['Incorect email or password'], 'model' => $this->request->getPost()]);
            }
        }
        return view('login');
    }

    public function Register() {
        $model = new UsersModel();
        if ($this->request->getPost()) {
            $insert_data = $this->request->getPost();
            $password = $insert_data['password'];
            $hasher = new \App\ThirdParty\PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
            $insert_data['password'] = $hasher->HashPassword($password);
            $insert_data['status'] = 1;
            if ($model->save($insert_data) === false) {
                return view('register', ['errors' => $model->errors(), 'model' => $this->request->getPost()]);
            } else {
                return redirect()->to(base_url());
            }
        }
        return view('register');
    }
    
    public function forget_password() {

        $model = new ForgetPasswordModel();
        $resetModel = new ResetPasswordModel();
        
        if ($this->request->getPost()) {
            $insert_data = $this->request->getPost();
            
            $check = $model->check_user($insert_data);
            
            if ($check) {
                $insert_data['user_id'] = $check->id;
                $insert_data['hash'] = md5(uniqid($insert_data['email'], true));
                $insert_data['created_at'] = date('Y-m-d h:i:s');
                $rec = $resetModel->reset_password($insert_data);
                
                return redirect()->to(base_url().'/reset-password/'.$rec->hash);
            } else {
                return view('forget-password', ['errors' => ['Email does not exist is our database.'], 'model' => $this->request->getPost()]);
            }
        }

        return view('forget-password');
    }
    
    public function password_reset($hash) {
        $userModel = new UsersModel();
        $resetModel = new ResetPasswordModel();
        $model = $resetModel->findByHash($hash);
        if(!$model) {
            throw new \Exception("Something went wrong!");
        }
        
        if ($this->request->getPost()) {
            $insert_data = $this->request->getPost();
            
            
            $hash = $insert_data['hash'];
            
            $check = $resetModel->findByHash($hash);
            
            if($insert_data['password'] != $insert_data['confirm_password']) {
                return view('reset-password', ['errors' => ['Password does not match.'], 'resetModel' => $this->request->getPost(), 'model'=>$check, 'hash'=>$hash]);
            }
            
            
            if (!$check) {
                return view('reset-password', ['errors' => ['something went wrong.'], 'resetModel' => $this->request->getPost(), 'model'=>$check, 'hash'=>$hash]);
            }
            
            if($insert_data['password']) {
                $password = $insert_data['password'];
                $hasher = new \App\ThirdParty\PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
                $insert_data['password'] = $hasher->HashPassword($password);
                
                
                $data = [
                    'id'=>$model->id,
                    'password'=>$insert_data['password'],
                ];
                
                $userModel->save($data);
                $this->session->setFlashdata('success','Password reset successfully');
                return redirect()->to(base_url());
            }
        }
        return view('reset-password',['model'=>$model, 'resetModel'=>$resetModel, 'hash'=>$hash]);
        
    }

}
