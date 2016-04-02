<?php if(!defined("BASEPATH")){ exit("No direct script access allowed"); }

/**
 * Class Moderator
 */
class Moderators {

    protected $Md;

    protected $login = 'login';
    protected $password = 'password';

    protected $db_table = 'moderator';
    protected $db_field_name = 'login';
    protected $db_field_pass = 'pass';
   

  public function __construct()
    {
       
      $this->Md = &get_instance();
      
    }

    /**
     * Проверка на авторизацию
     *
     * @return bool
     */
    public function check()
    {
        if($this->Md->session->userdata('is_auth_moder') === true)
        {
            return true;
        }

        return false;
    }

    public function check_and_redirect($to = '/', $exclude = '')
    {      
        if($this->Md->session->userdata('is_auth') === true)
        {
            return true;
        } else {
            if(uri_string() == $to OR uri_string() == $exclude)
            {
                return false;
            }
        }

        redirect($to);
    }

   

    public function logout()
    {
        $this->Md->session->unset_userdata('is_auth');
        $this->Md->session->sess_destroy();

        return true;
    }
}