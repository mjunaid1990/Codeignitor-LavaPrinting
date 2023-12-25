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
class SettingsModel extends Model {

    //put your code here

    protected $db;
    protected $id;

    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['group_type', 'name', 'value'];
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

    public function findBySections($section) {
        $builder = $this->db->table('settings');
        $builder->where('group_type', $section);
        $row = $builder->get()->getResult();
        if ($row) {
            return $row;
        }
        return false;
    }
    
    public function findByKey($key) {
        $builder = $this->db->table('settings');
        $builder->where('name', $key);
        $row = $builder->get()->getRow();
        if ($row) {
            return $row;
        }
        return false;
    }
    
    public function findValueByKey($key) {
        $builder = $this->db->table('settings');
        $builder->where('name', $key);
        $row = $builder->get()->getRow();
        if ($row) {
            return $row->value;
        }
        return false;
    }
    
    public function updateSettings($settings) {
        $builder = $this->db->table('settings');
        if($settings) {
            foreach ($settings as $column=>$value) {
                if($value) {
                    $builder->where('name', $column);
                    $builder->update(['value'=>$value]);
                }
            }
        }
    }

}
