<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Base_Controller {

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
                  $this->load->model('component/news/api_news','news');
	}

	public function action_index()
	{
        $this->render('index');
	}
        public function action_company($id="")
	{
        $this->render('compania',array('company'=>  $this->api->company($id)));
	}
        public function action_resume($id)
	{
            $userdata = $this->api->get_student($id);
        $this->render('rezume',array(
            "js"=>  $this->asset->js("valid_form"),
            'student'=>$userdata)
             
                );
	}
        public function action_contacts(){
            $this->render('contact');
        }
        public function action_register(){
            $message=""; $itsOK =false;
            if($this->checkCompany($this->input->post('username_'))===true&
                    $this->checkUser($this->input->post('username_'))===true
                    &$this->checkStudent($this->input->post('username_'))===true){
                $itsOK =true;
                    }
          
            if( $this->input->post('status_')==="Студент"&$itsOK ===true){
                $this->db->insert($this->_student,array(
                    'username'=>  $this->input->post('username_'),
                    'email'=> $this->input->post('email_'),
                    'password'=>$this->input->post('pass1'),
                    
                    'active'=>false,
                    'hash'=>  md5($this->input->post('username_').$this->input->post('pass1'))
                ));
                $this->MailToActive($this->input->post('email_'), 
                        md5($this->input->post('username_').$this->input->post('pass1')), 
                        "student");
                $message.=" Для подтверждения регистрации мы послали вам письмо на email <br/> пожалуйста подтвердите регистрацию";
                return $this->send_request($message);
            }elseif($itsOK ===true){
                 $this->db->insert($this->_company,array(
                    'login'=>  $this->input->post('username_'),
                    'email'=> $this->input->post('email_'),
                    'pass'=>$this->input->post('pass1'),
                    
                    'active'=>false,
                    'hash'=>  md5($this->input->post('username_').$this->input->post('pass1'))
                ));
                 $this->MailToActive($this->input->post('email_'), 
                        md5($this->input->post('username_').$this->input->post('pass1')), 
                        "company");
                $message.=" Для подтверждения регистрации мы послали вам письмо на email <br/> пожалуйста подтвердите регистрацию";
                return $this->send_request($message);
            }else{
                 $message.="Что то пошло не так";
                return $this->send_request($message,true);
            }
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
        public function checkUser($login){
         $users=    $this->db->query("SELECT * FROM users WHERE user_name = '".$login."'")->result_array();
         if(  count($users)>0){
             return false;
         }else{
             return true;
         }
        }
        public function checkStudent($login){
            $users=    $this->db->query("SELECT * FROM student WHERE username = '".$login."'")->result_array();
         if(  count($users)>0){
             return false;
         }else{
             return true;
         } 
        }
        public function checkCompany($login){
             $users=    $this->db->query("SELECT * FROM company WHERE login = '".$login."'")->result_array();
         if(  count($users)>0){
             return false;
         }else{
             return true;
         }
        }
        public function MailToActive($email,$hash,$who){
             $this->load->library('email');
        $config['useragent']="kazatu.develop@yandex.kz";
        $config['protocol']="smtp";
        $config['smtp_host']="ssl://smtp.yandex.ru";
        $config['smtp_user']="kazatu.develop@yandex.kz";
         $config['smtp_pass']="kazatu1957";
         $config['smtp_port']="465";
         $config['smtp_timeout']="5";
         $config['mailtype']="html";
         //$config['charset']="windows-1251";
         $this->email->initialize($config);
        

$date=time();

//Сообщение зарегистрированному пользователю

$message="Сегодня в ".date("d.m.Y",$date)." на сайте ". base_url()." был 
зарегистрирован
пользователь с вашим email. Поэтому вы получили данное письмо. Если вы не 
регистрировались на нашем сайте, то попросту удалите данное письмо, а если 
же это были вы то перейдите по нижеприведённой ссылке.

Ссылка для активации: <a href='".base_url()."welcome/activate/".$email."/".$hash."/".$who."' >Перейти</a> ";

//Отправляем пользователю

$this->email->from('kazatu.develop@yandex.kz', 'kazatu.develop');
$this->email->to($email);
$this->email->subject('Активация аккаунта');
$this->email->message($message);
$this->email->set_newline("\r\n");
$this->email->send();  
echo $this->email->print_debugger();
            
        }
        public function action_login(){
            $name=  $this->input->post('name_');
            $pass=  md5($this->input->post('pass_'));
            $table="";
            $logurl="";
            $res="";
            $status=  $this->input->post('log_status_');
            switch ($status):
                case "Студент":
                $table="student";
                $logurl="resume";
              $res=   $this->db->query("SELECT * FROM $table WHERE username='".$name."' AND password='".$pass."'")->row_array();
                    break;
                case "Работодатель":
                    $table="company";
                    $logurl="company";
              $res=  $this->db->query("SELECT * FROM $table WHERE login='".$name."' AND pass='$pass'")->row_array();
                    break;
                    
            endswitch;
           
            if(count($res)>0){
                $id_sess=$res["id_$table"];
                $this->session->set_userdata(array('login'=>$name,'loged_in'=>true,'status'=>$table, "id_$table"=>$id_sess));
                $this->send_request("Вы успешно авторизовались в системе",false,$logurl,$id_sess);
            }else{
              $this->send_request("Ошибка в базе нет такого логина",true);
            }
           
                  
        }
        function action_search_company($page){
            $this->load->library('pagination');
             if(isset($page)){
             $per_page = 12;
             if(empty($page)) $page=1;
            /* Будем при любом раскладе начинать с 0 страницы */
            if ($page < 0){
                $page = 0;
            }
            $data['tovar']=$this->api->get_company($page,$per_page);
            
            $this->load->library('pagination');
            $config['base_url'] = '/welcome/search_company/';
            $config['first_url'] = '/welcome/search_company/1';
            $config['total_rows'] = $this->api->all_company();
            $config['full_tag_open']='<div c lass="row"  align="center"><div class="col-md-4 col-md-offset-4" align="center"><ul class="pagination" >';
            $config['full_tag_close']='</ul></div></div>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li >';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_link'] = '<<';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '>>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['per_page'] = $per_page;
             /* Загружаем наши настройки */
            
            $this->pagination->initialize($config);
            $data['pages'] = $this->pagination->create_links();
            $this->render("search_company",array(
                'companies'=>$this->api->get_company($page-1,$per_page),
                'pages' =>$data['pages']
            ));
             }
            
            
        }
        function action_search_student($st="",$page=""){
            $this->filter();
            $this->load->library('pagination');
             if(isset($page)){
             $per_page = 12;
             if(empty($page)) $page=1;
            /* Будем при любом раскладе начинать с 0 страницы */
            if ($page < 0){
                $page = 0;
            }
            $data['infa']=$this->api->search_stud($page,$per_page);
            
            $this->load->library('pagination');
            $config['base_url'] = '/welcome/search_company/';
            $config['first_url'] = '/welcome/search_company/1';
            $config['total_rows'] = $this->api->all_student($st);
            $config['full_tag_open']='<div c lass="row"  align="center"><div class="col-md-4 col-md-offset-4" align="center"><ul class="pagination" >';
            $config['full_tag_close']='</ul></div></div>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li >';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_link'] = '<<';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '>>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['per_page'] = $per_page;
             /* Загружаем наши настройки */
            
            $this->pagination->initialize($config);
            $data['pages'] = $this->pagination->create_links();
             $data['js']= $this->asset->js('filter');

            $this->render("search_student",$data);
             }
        }
        function action_search($st,$page){
           $this->load->library('pagination');
             if(isset($page)){
             $per_page = 12;
             if(empty($page)) $page=1;
            /* Будем при любом раскладе начинать с 0 страницы */
            if ($page < 0){
                $page = 0;
            }
            $data['infa']=$this->api->get_students($st,$page,$per_page);
            
            $this->load->library('pagination');
            $config['base_url'] = '/welcome/search_company/';
            $config['first_url'] = '/welcome/search_company/1';
            $config['total_rows'] = $this->api->count_get_students( $st);
            $config['full_tag_open']='<div c lass="row"  align="center"><div class="col-md-4 col-md-offset-4" align="center"><ul class="pagination" >';
            $config['full_tag_close']='</ul></div></div>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li >';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_link'] = '<<';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '>>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['per_page'] = $per_page;
             /* Загружаем наши настройки */
            
            $this->pagination->initialize($config);
            $data['pages'] = $this->pagination->create_links();
             $data['js']= $this->asset->js('filter');

            $this->render("search_student",$data);
             }
        }
        public function filter(){
            
            
            if($this->input->post('fac_id')){
            $reg="";   
            $this->session->unset_userdata('opyt');
            $this->session->unset_userdata('dop_nav');
            $this->session->unset_userdata('fac_id');
            $this->session->unset_userdata('region');
            if($this->input->post('region')==="Неважно"){
                $reg="";
            }
            $this->session->set_userdata('opyt',$this->input->post('opyt')  );
            $this->session->set_userdata('dop_nav',$this->input->post('dop_nav')  );
            $this->session->set_userdata('fac_id',$this->input->post('fac_id')  );
            $this->session->set_userdata('region', $reg );
            }
            
//            $opyt=    $this->session->userdata('opyt');
//            $dop_nav= $this->session->userdata('dop_nav');
//            $fac_id=  $this->session->userdata('fac_id');
//            $region=  $this->session->userdata('region');
           
         
         
            
        }
                function action_news($id=""){
        if(!empty($id)){
            $this->render("news_2lvl",array(
                'news'=>  $this->news->api_get_content($id)
            ));
        }else{
            $this->render("news",array(
                'allnews'=>  $this->news->api_get_text()
            ));
        }
        }
        public function action_change($status="",$id=1){
            switch ($status){
                case "student":
                    $this->api->change_student($id);
                    break;
                case "company":
                    $this->api->change_company($id);
                    break;
                    
            }
        }
        public function action_logout($status){
            $this->session->unset_userdata( 'login');
            $this->session->unset_userdata('loged_in');
            $this->session->unset_userdata('status');
            $this->session->unset_userdata("id_$status");
             
            redirect(base_url());
        }
        public function action_to_prak($id){
           $res="";
            if($this->session->userdata('id_company')){
                $this->api->invite($id);
             $res= $this->request("Заявка отправлена успешно");
            }
            else{
               $res= $this->request("Действие не доступно. Вы не являетесь работодателем либо вы не авторизовались",true);
            }
            return $res;
        }
        public function request($message,$error=false){
            $ret=json_encode(array(
                'message'=>$message,
                'error'=>$error
            ));
            echo $ret;
            die();
            
        }
        public function action_get_all_spec(){
         $facs=   $this->db->get("moderator")->result_array();
          $specials=  $this->db->get("special")->result_array();
          $ret_arr =array();
          $i=0;
          for(;$i<count($facs); $i++){
              array_push($ret_arr, array("name"=>$facs[$i]['name_faculity'],"id"=>$facs[$i]["id_faculity"], "specials"=>array()));
            $j =0;
              for(;$j<count($specials) ; $j++){
                  if($facs[$i]['id_faculity']==$specials[$j]['fc']){
                    array_push($ret_arr[$i]["specials"], array("spec"=>$specials[$j]["name"],"code"=>$specials[$j]['code'],"fc_code"=>$specials[$j]['fc']));
                  }
              }
          }
          echo json_encode($ret_arr);
        }
       
   
}
