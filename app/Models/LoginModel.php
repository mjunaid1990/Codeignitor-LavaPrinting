<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of UsesrModel
 *
 * @author Mohammad Junaid
 */
class LoginModel extends Model {

    //put your code here
    protected $db;
    protected $id;
    protected $password;
    protected $email;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $validationRules = [
        'email' => 'required',
        'password' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function auth_check($data) {


        if ($data) {

            $builder = $this->db->table('users');
            $builder->where('email', $data['email']);
            $builder->where('status', 1);
            $row = $builder->get()->getRow();

            if ($row) {
                $hasher = new \App\ThirdParty\PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
                if (!$hasher->CheckPassword($data['password'], $row->password)) {
                    // Password failed, return
                    return false;
                }
                return $row;
            }
            return false;
        }
        return false;
    }

    

}
