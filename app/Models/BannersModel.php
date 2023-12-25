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
class BannersModel extends Model {

    //put your code here

    protected $db;
    protected $id;

    protected $table = 'banners';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'image', 'heading_1', 'paragraph_1', 'item_1', 'item_2', 'tablet_image', 'mobile_image'];
    protected $useTimestamps = false;
    protected $validationRules = [];
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

    public function featuredImageUrl($id, $image) {
        if($id && $image) {
            $path = WRITEPATH . '/uploads/banners/' . $id . '/' . $image;
            if (file_exists($path)) {
                return base_url().'/writable/uploads/banners/'.$id.'/'.$image;
            }
        }
        return false;
    }
    

}
