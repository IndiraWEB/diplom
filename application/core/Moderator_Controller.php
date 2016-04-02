<?php

/**
 * Class Moderator_Controller
 */
class Moderator_Controller extends Base_Controller {

    protected $theme = 'moderator';
    /**
     *
     */
    public function __construct()
    {
        parent::__construct();

        if( ! file_exists(APPPATH.'runtime/system/installed.lock'))
        {
            redirect('eidos/setup');
        }
        $this->config->set_item('language', 'russian');
       $this->load->model('component/component');
       //$this->load->model('moderator/logfile',"moderators");
        $this->lang->load('backend/global');
        $this->load->library(array('asset', 'session','moderators'));
        $this->load->helper('url');
        $this->asset->asset_path('assets/admin');

        // Проверка авторизован ли пользователь
       
        if( ! $this->moderators->check() AND $this->uri->segment(2) != 'authmod')
        {
            redirect('moderator/authmod');
        }
    }

    /**
     * Исполнение кода до выполнения метода
     */
    public function before()
    {
        parent::before();
    }

    /**
     * Исполнение кода после выполнения метода
     */
    public function after()
    {
        parent::after();
    }

}