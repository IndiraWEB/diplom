<?php
class Api extends MY_Model {
    public $_student="student";
    public $_company="company";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
public function change_student($id){
   $this->db->where("id_student",$id);
   $this->db->update(array(
       ''
   ));
  
}
public function get_student($id){
    return $this->db->get_where($this->_student,array('id_student'=>$id))->row_array();
}

// get  current company cabinet
public function company($id){
    return $this->db->get_where($this->_company,array('id_'.$this->_company=>$id))->row_array();
}
public function change_company($id){
    
    
}
public function get_company($page,$per_page){
  return  $this->db->query("SELECT * FROM `$this->_company` LIMIT $page , $per_page ")->result_array();
}
public function all_company(){
    return count($this->db->get($this->_company)->result_array());
}
}