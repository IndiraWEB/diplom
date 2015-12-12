<?php

class Quest extends Moderator_Controller {
     public function __construct()
    {
        parent::__construct();
       // $this->load->view('component/blank/img_edit');
    }

    public function before()
    {
        $this->load->model('component/blog/database', 'dbmodel');
     
    }

    public function action_index()
    {
         $this->render('dashboard', array(
            'css' => $this->asset->css(array('uikit', 'style', 'font-awesome')),
            'js' => $this->asset->js(array('jquery', 'uikit', 'moment')),
           
           
                'question' => $this->dbmodel->get_comment()
            
        ));


    }
    public function action_noreplay($action=''){
        if($action!=''){
            switch ($action){
                case 'reply':
                break;
                case 'dalete':
                    
                    break;
                
            }
        }
        $this->render('dashboard',array(
            'css' => $this->asset->css(array('uikit', 'style', 'font-awesome')),
            'js' => $this->asset->js(array('jquery', 'uikit', 'moment')),
             'component'=>  $this->load->view('quest/noreply',array(
                 'question'=> $this->dbmodel->noreplay()),
                     true),
                    
            
        ));
      
    }

    public function action_setup()
    {
        if($this->component->status(strtolower(__CLASS__)) != 1)
        {
            $this->render('dashboard', array(
                'css' => $this->asset->css(array('uikit', 'style')),
                'js' => $this->asset->js(array('jquery', 'uikit', 'moment')),
                'component_menu' => $this->component->get_navigation(),
                'component' => $this->component->run(strtolower(__CLASS__), 'setup',true)
            ));

        }

        redirect('admin/components/'.strtolower(__CLASS__));
    }
    public function action_add_comment($action = '')
    {
        if ($action != '')
        {
            switch ($action)
            {
                case 'create':
                    $this->dbmodel->create_comment();
                    $this->session->set_flashdata('status', 'Пользователь успешно добавлена');
                    redirect('/admin/components/comments');
                    break;
            }
        }
        $this->render('dashboard', array(
            'css' => $this->asset->css(array('uikit', 'style', 'font-awesome')),
            'js' => $this->asset->js(array('jquery', 'uikit', 'moment')),
            'component_menu' => $this->component->get_navigation(),
            'component' => $this->load->view('component/comments/add_comment', array(

            ), true)
        ));

    }
      
   
    
    public function action_comment_edit($id, $action = '')
    { 
        
        if ($action != '')
        {
            switch ($action)
            {
                case 'save':
                   
                    $this->db->where('comm_id', $id);
       
        $this->db->update('comments', array(
            'username' => $this->input->post('user_name_'),
            
           
            'email' => $this->input->post('email_'),
            'text' => $this->input->post('text_'),
            'date' => $this->input->post('data_')
          
        ));
                    $this->session->set_flashdata('status', '<center><p style="background-color:#66CC33; font-size: 20px;  ">Комментарий пользователя '.$this->input->post('name_') .' успешно обновлены</p></center>');
                    redirect('/admin/components/comments/comment_edit/'.$this->input->post('comm_id'));
                    break;
                case 'delete':
                    $this->dbmodel->comment_delete($id);
                    $this->session->set_flashdata('status', 'Комментарий '.$this->input->post('name_') .' удален');
                    redirect('/admin/components/comments/');
                    break;
            }
        }
        $this->render('dashboard', array(
            'css' => $this->asset->css(array('uikit', 'style', 'font-awesome')),
            'js' => $this->asset->js(array('jquery', 'uikit', 'moment')),
            'component_menu' => $this->component->get_navigation(),
            'component' => $this->load->view('component/comments/comment_edit', array(
                'comm_id' => $id,
                'comment_content' => $this->dbmodel->get_comment_content($id),
                
               
            ), true)
        ));

    }
    
}