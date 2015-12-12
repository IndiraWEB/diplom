<?php

class Authmod extends Moderator_Controller {

    protected $theme = 'moderator';
    protected $layout = 'layout_auth';

    public function before()
    {
        $this->load->model('moderator/logfile', 'dbmodel');
     
    }
    public function action_index()
    {
        $this->render('auth', array(
            'css' => $this->asset->css(array('uikit', 'style')),
            'js' => $this->asset->js(array(''))
        ));
    }

    public function action_login()
    {
        if( ! $this->dbmodel->login())
        {
            $this->session->set_flashdata('auth_error', 'Логин или пароль введены не верно');
            redirect('moderator/authmod');
        }

        redirect('moderator');
    }

    public function action_logout()
    {
        $this->moderators->logout();
        redirect('moderator');
    }
}