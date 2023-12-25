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
class QuotesModel extends Model {

    //put your code here

    protected $db;

    

    protected $id;
    protected $name;
    protected $email;
    protected $phone;
    protected $product;
    protected $stock_type;
    protected $qty;
    protected $product_unit;
    protected $product_length;
    protected $product_width;
    protected $product_depth;
    protected $product_cmyk;
    protected $file;
    protected $instructions;
    protected $created_at;
    protected $updated_at;
    protected $status;

    protected $table = 'quotes';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'email', 'phone', 'product', 'stock_type', 'qty', 'product_unit', 'product_length', 'product_width', 'product_depth', 'product_cmyk', 'file', 'instructions', 'created_at', 'updated_at', 'status', 'qty2', 'qty3', 'color'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $validationRules = [
        'name' => 'required',
        'email' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
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
    
    public function today_quotes() {
        $sql = 'SELECT count(*) as count
                FROM `quotes`
                where created_at > date_sub(curdate(),interval 1 day)';
        $row = $this->db->query($sql)->getRow();
        if($row) {
            return $row->count;
        }
    }
    
    public function month_quotes() {
        $sql = 'SELECT count(*) as count
                FROM `quotes`
                where MONTH(created_at) = MONTH(now()) and YEAR(created_at) = YEAR(now())';
        $row = $this->db->query($sql)->getRow();
        if($row) {
            return $row->count;
        }
    }

}
