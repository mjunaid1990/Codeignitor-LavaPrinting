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
class ProductImagesModel extends Model {

    //put your code here

    protected $db;

    

    protected $id;
    protected $product_id;
    protected $image;

    protected $table = 'product_images';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'product_id', 'image'];
    protected $useTimestamps = false;
    protected $createdField = '';
    protected $updatedField = '';
    protected $validationRules = [
        'product_id' => 'required',
        'image' => 'required'
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
    
    public function findByProductId($product_id) {
        $builder = $this->db->table($this->table);
        $builder->where('product_id', $product_id);
        return $builder->get()->getResult();
    }
    
    public function featuredImageUrl($id, $image) {
        if($id && $image) {
            $path = WRITEPATH . '/uploads/products/' . $id . '/' . $image;
            if (file_exists($path)) {
                return base_url().'/writable/uploads/products/'.$id.'/'.$image;
            }
        }
        return false;
    }
    
    public function featuredImageUrlThumb($id, $image) {
        if($id && $image) {
            $path = WRITEPATH . '/uploads/products/' . $id . '/' . $image;
            $new_path = WRITEPATH . '/uploads/products/' . $id . '/' . 'thumb_'.$image;
            if(!file_exists($new_path)) {
                try {
                    $crop = \Config\Services::image()
                        ->withFile($path)
                        ->resize(269, 269, true, 'height')
                        ->save($new_path);
                } catch (CodeIgniter\Images\ImageException $e) {
                    echo $e->getMessage();
                }
            }
            return base_url().'/writable/uploads/products/'.$id.'/'.'thumb_'.$image;
        }
        return false;
    }

}
