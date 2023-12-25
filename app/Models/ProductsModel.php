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
class ProductsModel extends Model {

    //put your code here

    protected $db;

    

    protected $id;
    protected $name;
    protected $category_id;
    protected $original_price;
    protected $selling_price;
    protected $meta_title;
    protected $meta_keyword;
    protected $meta_description;
    protected $featured_image;
    protected $views;
    protected $description;
    protected $slug;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'description', 'slug', 'category_id', 'original_price', 'selling_price', 'meta_title', 'meta_keyword', 'meta_description', 'featured_image', 'views', 'short_description'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $validationRules = [
        'name' => 'required',
        'category_id' => 'required'
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
    
    public function findByCategory($id) {
        $builder = $this->db->table($this->table);
        $builder->where('category_id', $id);
        return $builder->get()->getResult();
    }
    
    public function findByCategoryNotInProductID($id, $product_id) {
        $builder = $this->db->table($this->table);
        $builder->where('category_id', $id);
        $builder->whereNotIn('id', [$product_id]);
        $builder->limit(6);
        return $builder->get()->getResult();
    }
    
    public function findCategoryName($id) {
        $builder = $this->db->table('categories');
        $builder->where('id', $id);
        $res = $builder->get()->getRow();
        if($res) {
            return $res->name;
        }
        return false;
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

    public function featuredImageUrl($id, $image) {
        if($id && $image) {
            $path = WRITEPATH . '/uploads/' . $id . '/' . $image;
            if (file_exists($path)) {
                return base_url().'/writable/uploads/'.$id.'/'.$image;
            }
        }
        return false;
    }
    
    public function featuredImageUrlThumb($id, $image) {
        if($id && $image) {
            $path = WRITEPATH . '/uploads/' . $id . '/' . $image;
            $new_path = WRITEPATH . '/uploads/' . $id . '/' . 'thumb_'.$image;
            if(file_exists($path) && !file_exists($new_path)) {
                try {
                    $crop = \Config\Services::image()
                        ->withFile($path)
                        ->resize(269, 269, true, 'height')
                        ->save($new_path);
                } catch (CodeIgniter\Images\ImageException $e) {
                    echo $e->getMessage();
                }
            }
            if(file_exists($new_path)) {
                return base_url().'/writable/uploads/'.$id.'/'.'thumb_'.$image;
            }
            return '';
        }
        return false;
    }
    
    public function limitWords($desc, $limit) {
        $trimstring = '';
        $string = strip_tags($desc);
        if (strlen($string) > $limit) {
            $trimstring = substr($string, 0, $limit). ' ...';
        }else {
            $trimstring = $string;
        }
        return $trimstring;
    }
}
