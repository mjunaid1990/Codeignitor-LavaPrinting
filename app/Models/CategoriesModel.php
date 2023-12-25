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
class CategoriesModel extends Model {

    //put your code here

    protected $db;

    

    protected $id;
    protected $name;
    protected $parent_id;
    protected $slug;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'parent_id', 'slug', 'description', 'meta_title', 'meta_description', 'meta_keyword', 'status'];
    protected $useTimestamps = false;
    protected $createdField = '';
    protected $updatedField = '';
    protected $validationRules = [
        'name' => 'required',
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
    
    public function findBySlug($slug) {
        $builder = $this->db->table($this->table);
        $builder->where('slug', $slug);
        return $builder->get()->getRow();
    }
    
    public function findProdcutByCategoryId($id) {
        $builder = $this->db->table('products');
        $builder->where('category_id', $id);
        return $builder->get()->getRow();
    }
    
    public function findByParentID($id) {
        $builder = $this->db->table($this->table);
        $builder->where('parent_id', $id);
        $builder->where('status', 1);
        return $builder->get()->getResult();
    }
    
    public function findCategorieswithParentID() {
        $builder = $this->db->table($this->table);
        $builder->whereNotIn('id', [1,2,3]);
        return $builder->get()->getResult();
    }
    
    public function findByIds($ids) {
        $builder = $this->db->table($this->table);
        $builder->whereIn('id', $ids);
        $res = $builder->get()->getResult();
        if($res) {
            return $res;
        }
        return false;
    }

}
