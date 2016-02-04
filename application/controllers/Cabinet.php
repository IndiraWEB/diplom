<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabinet extends Base_Controller {

    protected $controller = __CLASS__;
    public $_studnet= "student";
    public $_company= "company";
    
    public function before()
	{

        
	}

	public function __construct()
	{
		parent::__construct();
                $this->load->database();
                 $this->load->library('session');
                  $this->load->model('component/member/api','api');
                  $this->load->model('component/member/api_company','company');
	}

        public function action_company_edit($id,$datatype){
            switch ($datatype){
                case 'image':
                    $upload= $this->company->insert_image($id);
                    $this->session->set_flashdata('upload',$upload);
                   
                    
                    break;
                case 'data':
                    $this->db->query('UPDATE `company` SET `name`="'.$this->input->post('manname_').'",'
                            . ' `login`="'.$this->input->post('login_').'",'
                            . ' `phone`="'.$this->input->post('tel_comp').'",'
                            . ' `region`="'.$this->input->post('region_').'",'
                            . ' `description`="'.$this->input->post('dop_').'"'
                            . 'WHERE `id_company`="'.$id.'"');
                    break;
            }
            redirect('welcome/company/'.$id);
            
        }
        public function  action_student_change($id){
            $this->db->where('id_student',$id);
            $this->db->update('student',array(
                'burn'=>  $this->input->post('burn_'),
                'name'=> $this->input->post('name_'),
                'fathername'=> $this->input->post('fathname_'),
                'family'=> $this->input->post('fam_'),
                'dop_nav'=>$this->input->post('add_skills'),
                'opyt'=>$this->input->post('experience'),
                'region'=>$this->input->post('region_'),
                'fc_code'=>$this->input->post('fac_'),
                'spec'=>trim($this->input->post('stepen_')).trim($this->input->post('spec_name_'))
            ));
          return  $this->send_request('Изменения успешно внесены в базу');
//            redirect('welcome/resume'.$id);
        }
        public function send_request($data, $error=false, $status="",$id=""){
            $return =array(
                        'message'=>$data,
                        'error'=>$error,
                        'status'=>$status,
                           'id'=>$id
                    );
            echo json_encode($return);
        die();
        }
        }
