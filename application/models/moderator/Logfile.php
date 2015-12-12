<?php if(!defined("BASEPATH")){ exit("No direct script access allowed"); }

/**
 * Class Moderator
 */
class Logfile extends MY_Model {

    protected $Md;

    protected $login = 'login';
    protected $password = 'password';

    protected $db_table = 'moderator';
    protected $db_field_name = 'login';
    protected $db_field_pass = 'pass';
   

  
    /**
     * Проверка на авторизацию
     *
     * @return bool
     */
    public function check()
    {
        if($this->session->userdata('is_auth') === true)
        {
            return true;
        }

        return false;
    }

    public function check_and_redirect($to = '/', $exclude = '')
    {      
        if($this->session->userdata('is_auth') === true)
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

    public function login($name = '', $pass = '')
    {  
      
        $query = $this->db->get_where('moderator', array('user_name' => $this->input->post('login')));
        $result = ($query->num_rows() > 0) ? $query->row_array() : false;
     
        if(md5($this->input->post('password'))=== $result['password'])
        {
            $this->session->set_userdata('is_auth', true);
            $this->session->set_userdata('modername',  $this->input->post($this->login));
            return true;
        }
         
        return false;
          
    }
    public function logout()
    {
        $this->session->unset_userdata('is_auth');
        $this->session->sess_destroy();

        return true;
    }
}