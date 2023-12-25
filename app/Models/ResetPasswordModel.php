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
class ResetPasswordModel extends Model {

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
        'password' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function reset_password($data) {
        $builder = $this->db->table('reset_passwords');
        $builder->insert($data);
        
        $builder_ = $this->db->table('reset_passwords');
        $builder_->where('user_id', $data['user_id']);
        return $builder_->get()->getRow();
    }
    
    public function findByHash($hash) {
        
        $builder_ = $this->db->table('reset_passwords');
        $builder_->where('hash', $hash);
        return $builder_->get()->getRow();
    }

    

}
