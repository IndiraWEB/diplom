<?php

class Moderboard extends Moderator_Controller {

 //protected $theme = 'moderator';
    public function __construct()
    {
        parent::__construct();
       
        $this->load->model('component/component','component');
   
    }

    public function action_index()
    {
        $this->render('dashboard', array(
            'css' => $this->asset->css(array('uikit', 'style', 'font-awesome')),
            'js' => $this->asset->js(array('jquery', 'uikit', 'moment')),
          
            
        ));
    }

    public function action_setting()
    {
        if($this->input->post('setting'))
        {
            if($this->input->post('password') == $this->input->post('password_again'))
            {
                $this->db->where('login', $this->session->userdata('modername'));
                $this->db->update('moderator', array('pass' => md5($this->input->post('password'))));
                $this->session->set_flashdata('success', 'Пароль изменен');
                redirect('/moderator/moderboard/setting');
            } else {
                $this->session->set_flashdata('success', 'Пароли не совпадают');
                redirect('/moderator/moderboard/setting');
            }
        }

        $this->render('dashboard', array(
            'css' => $this->asset->css(array('uikit', 'style')),
            'js' => $this->asset->js(array('jquery', 'uikit', 'moment')),
          
            'component' => $this->load->view('moderator/setting','', true)
        ));
    }
}