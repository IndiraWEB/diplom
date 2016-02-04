<?php
class Api extends MY_Model {
    public $_student="student";
    public $_company="company";
    public $_dogovor="document";
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
public function  all_student($st){
    $text="";
            $opyt=    $this->session->userdata('opyt');
            $dop_nav= $this->session->userdata('dop_nav');
            $fac_id=  $this->session->userdata('fac_id');
            $region=  $this->session->userdata('region');
    if($dop_nav=="on"&$opyt=="on") { 
         
            $text="SELECT * FROM `$this->_student` WHERE `fc_code` LIKE '$fac_id' AND `dop_nav` NOT NULL AND `opyt` NOT NULL AND `region` "
                    . "LIKE '%$region%'";
                    
         }elseif($dop_nav=="on"&$opyt==""){
             $text="SELECT * FROM `$this->_student` WHERE `fc_code` LIKE '$fac_id' AND `dop_nav` NOT NULL  AND `region` "
                    . "LIKE '%$region%'";
        }
        elseif($opyt==""&$opyt==""){
             $text="SELECT * FROM `$this->_student` WHERE `fc_code` LIKE '$fac_id' AND  `region` "
                    . "LIKE '%$region%' ";
        }
        return count($this->db->query($text)->result_array());
}
public function search_stud($page,$per_page){
     $page=$page-1;
    $text="";
            $opyt=    $this->session->userdata('opyt');
            $dop_nav= $this->session->userdata('dop_nav');
            $fac_id=  $this->session->userdata('fac_id');
            $region=  $this->session->userdata('region');
            
             $text="SELECT * FROM `$this->_student` WHERE `fc_code` LIKE '$fac_id' AND  `region` "
                    . "LIKE '%$region%' LIMIT $page, $per_page";
        
        if($dop_nav==="on"&$opyt==="on") { 
         
            $text="SELECT * FROM `$this->_student WHERE` `fc_code` LIKE '$fac_id' AND `dop_nav` NOT NULL AND `opyt` NOT NULL AND `region` "
                    . "LIKE '%$region%'  LIMIT $page, $per_page";
                    
        }elseif($dop_nav==="on"&$opyt===""){
             $text="SELECT * FROM `$this->_student` WHERE `fc_code` LIKE '$fac_id' AND `dop_nav` NOT NULL  AND `region` "
                    . "LIKE '%$region%'  LIMIT $page, $per_page";
        }elseif($dop_nav===""&$opyt==="on"){
             $text="SELECT * FROM `$this->_student` WHERE `fc_code` LIKE '$fac_id' AND `opyt` NOT NULL  AND `region` "
                    . "LIKE '%$region%'  LIMIT $page, $per_page";
        }
       
        return $this->db->query($text)->result_array();
}
public function get_students($st,$page, $per_page){
    $page=$page-1;
    $qr="SELECT * FROM `$this->_student` WHERE `spec` LIKE '%$st%'"
            . "LIMIT $page ,$per_page";
    
    return $this->db->query($qr)->result_array();
}
public function count_get_students( $st){
    $qr="SELECT * FROM `$this->_student` WHERE `spec` LIKE '%$st%'";
    
    return count($this->db->query($qr)->result_array());
}
public function invite($id){
    $this->db->insert($this->_dogovor, array(
        'id_student'=>  $id,
        'id_company'=>  $this->session->userdata('id_company'),
        
        
    ));
}
}