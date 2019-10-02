<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    var $tableName, $tableId;

    function __construct(){
        parent::__construct();
        $this->tableName = "data";
        $this->tableId = "id";
    }

    function create($data){

        if($data){
            $query = $this->db->insert($this->tableName, $data);
            return $query;
        }
    }

    function get($id="",$field=""){

        if($id){
            if(!$field){
                $field = $this->tableId;
            }

            if(is_array($id)){
                $this->db->where_in($field, $id);
            }else{
            $this->db->where($field,$id);
        }
    }
        $query = $this->db->get($this->tableName);
        return $query->result_array();
    }


}