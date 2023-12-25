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
class UsersModel extends Model {

    //put your code here

    protected $db;

    

    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;
    protected $phone;
    protected $created_at;
    protected $updated_at;
    protected $status;
    protected $type;
    protected $new_password;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'password', 'status', 'created_at', 'updated_at', 'type'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $validationRules = [
        'email' => 'required',
        'firstname' => 'required',
//        'password' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    
    
    public function findUserByEmail($email) {
        $builder = $this->db->table($this->table);
        $builder->where('email', $email);
        $row = $builder->get()->getRow();
        if($row) {
            return $row;
        }
        return false;
    }
    
    public function get($id = '', $obj = true) {
        $builder = $this->db->table($this->table);
        if(is_numeric($id)) {
            $builder->where('id', $id);
            return $builder->get()->getRow();
        }
        if($obj) {
            return $builder->get()->getResult();
        }
        return $builder->get()->getResultArray();
    }
    
    public static function findActiveUserById($id) {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        $builder->where('status', 1);
        $row = $builder->get()->getRow();
        if($row) {
            return $row;
        }
        return false;
    }

}
