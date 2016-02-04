<?php
class Api_company extends MY_Model {
    public $_student="student";
    public $_company="company";
    public $_dogovor="document";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
public function __construct() {
    parent::__construct();
   // $this->load->helper('upload');
}
public function insert_image($id){
               $config['upload_path'] = './assets/img/company/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1024';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
		$config['encrypt_name']=   TRUE;
		$this->load->library('upload', $config);
	
                $upl_data="";
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			 $upl_data=$error ;
			
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
                        $upl_data=array('error'=>"none");
                        
                        $newimage = $data['upload_data']['file_name'];
                        $this->img_updata($id, $newimage);
		}
                return $upl_data;
}
public function img_updata($id,$imgname){
  $imgdata=  $this->db->query("SELECT * FROM `company` WHERE `id_company`='".$id."'")->row_array();
    $imgsel=$imgdata['image'];
    if(!empty($imgsel)){
        unlink($_SERVER['DOCUMENT_ROOT']."/assets/img/company/".$imgsel);
    }
    $this->db->query("UPDATE `company` SET `image`= '$imgname' WHERE `id_company`='$id'");
}
}