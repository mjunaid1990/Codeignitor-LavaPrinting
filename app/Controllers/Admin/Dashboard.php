<?php

namespace App\Controllers\Admin;


class Dashboard extends AdminController {

    public function index() {
        $data['title'] = 'Dashboard';
        return view('admin/index',$data);
    }

    public function logout() {
        $this->session->destroy();
        return redirect()->to(base_url().'/login');
    }

}
