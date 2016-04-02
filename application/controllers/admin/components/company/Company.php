<?php

class Company extends Admin_Controller {
     public function __construct()
    {
        parent::__construct();
       // $this->load->view('component/blank/img_edit');
    }

    public function before()
    {
        $this->load->model('component/'.strtolower(__CLASS__).'/database', 'dbmodel');
     
    }

    public function action_index()
    {
         $this->render('dashboard', array(
            'css' => $this->asset->css(array('uikit', 'style', 'font-awesome')),
            'js' => $this->asset->js(array('jquery', 'uikit', 'moment')),
            'component_menu' => $this->component->get_navigation(),
            'component' => $this->component->run(strtolower(__CLASS__), array(
                'company' => $this->dbmodel->get_company(),
                
            )
             
            )
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
    public function action_add_news($action = '')
    {
        if ($action != '')
        {
            switch ($action)
            {
                case 'create':
                    $this->dbmodel->create_news();
                    $this->session->set_flashdata('status', '<center><p style="background-color:#B2FF00">Новость успешно добавлена</p></center>');
                    redirect('/admin/components/news');
                    break;
            }
        }
        $this->render('dashboard', array(
            'css' => $this->asset->css(array('uikit', 'style', 'font-awesome')),
            'js' => $this->asset->js(array('jquery', 'uikit', 'moment')),
            'component_menu' => $this->component->get_navigation(),
            'component' => $this->load->view('component/news/add_news', array(

            ), true)
        ));

    }
      
   public function action_company_delete($id){
       $this->db->delete('company',array(
           'id_company'=>$id
       ));
       $this->session->set_flashdata('status',"<center><p style='background-color:#B2FF00'>Коммпания удалена</p></center>");
       redirect('admin/components/company');
       
   }
    
    public function action_news_edit($id, $action = '')      
    {   
        if ($action != '')
        {
            switch ($action)
            {
                case 'save':
                   
                     
                    $this->dbmodel->news_content_edit();
                    $this->session->set_flashdata('status', '<center><p style="background-color:#B2FF00">Страница успешно обновлена</p></center>');
                    redirect('/admin/components/news/news_edit/'.$this->input->post('news_id'));
                    break;
                case 'delete':
                    $this->dbmodel->news_delete($id);
                    $this->session->set_flashdata('status', '<center><p style="background-color:#B2FF00">Страница успешно удалена</p></center>');
                    redirect('/admin/components/news/');
                    break;
                case 'saveimg':
                   
                      $url= $this->do_upload();
                    $this->dbmodel->img_edit($url);
                    $this->session->set_flashdata('status', '<center><p style="background-color:#B2FF00">Картинка успешно обновлена</p></center>');
                    redirect('/admin/components/news/news_edit/'.$this->input->post('news_id'));
                    break;
            }
        }
        $this->render('dashboard', array(
            'css' => $this->asset->css(array('uikit', 'style', 'font-awesome')),
            'js' => $this->asset->js(array('jquery', 'uikit', 'moment')),
            'component_menu' => $this->component->get_navigation(),
            'component' => $this->load->view('component/news/news_edit', array(
                'news_id' => $id,
                'news_content' => $this->dbmodel->get_news_content($id),
                  'news_name' => $this->dbmodel->get_news_name($id),
//                'comments'=>$this->get_comment($id)
            ), true)
        ));

    }
//    private function get_comment($id){
//     return   $this->db->get_where('comments',array(
//         'to_comm'=>$id
//                          )
//                )->result_array();
//    }
     private function do_upload(){
        $type=  explode('.', $_FILES["img_full_path_"]["name"]);
        $type=$type[count($type)-1];
        $url="assets/img/".uniqid(rand()).".".$type;
        if(in_array($type, array('jpeg','jpg','png','gif')))
        if(is_uploaded_file($_FILES["img_full_path_"]["tmp_name"]))
        if(   move_uploaded_file ($_FILES["img_full_path_"]["tmp_name"],$url))
            return $url;
        return "";     
        
                  
    }
}