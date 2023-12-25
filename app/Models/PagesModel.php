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
class PagesModel extends Model {

    //put your code here

    protected $db;

    

    protected $id;
    protected $name;
    protected $slug;

    protected $table = 'pages';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'slug', 'description', 'image'];
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
    
    public function imageUrl($id, $image) {
        if($id && $image) {
            $path = WRITEPATH . '/uploads/pages/' . $id . '/' . $image;
            if (file_exists($path)) {
                return base_url().'/writable/uploads/pages/'.$id.'/'.$image;
            }
        }
        return false;
    }

}
