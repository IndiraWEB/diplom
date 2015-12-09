<?php
class Api extends MY_Model {
    public $_student="student";
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
public function change_company($id){
    
    
}
}