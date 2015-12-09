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
	}

	public function action_index()
	{
        $this->render('index');
	}
        public function action_compania()
	{
        $this->render('compania');
	}
        public function action_resume($id)
	{
            $userdata = $this->api->get_student($id);
        $this->render('rezume',array(
            "js"=>  $this->asset->js("valid_form"),
            'student'=>$userdata)
             
                );
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
        function action_search_company(){
            $this->render("search_company");
        }
        function action_search_student(){
            $this->render("search_student");
        }
        function action_news(){
            $this->render("news");
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
   
}
