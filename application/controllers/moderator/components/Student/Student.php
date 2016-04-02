<?php

class Student extends Moderator_Controller {
     public function __construct()
    {
        parent::__construct();
       // $this->load->view('component/blank/img_edit');
    }

    public function before()
    {
        $this->load->model('component/'.strtolower(__CLASS__).'/database', 'dbmodel');
     
    }

    public function action_index($page ="",$sort ="")
    {   
        if(empty($page)){
            $page = 0;
        }
        if(empty($sort)){
            $sort = "";
        }
        $per_page =16;
            $data['student'] =  $this->dbmodel->get_students($sort,$page);
         $this->load->library('pagination');
            $config['base_url'] = '/moderator/components/student';
            $config['first_url'] = '/moderator/components/student/index/0/';
            $config['total_rows'] = $this->dbmodel->all_student();
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
           
            
            
             
        
        $this->load->view("moderator/layouts/layout",array(
       "content" => $this->load->view("moderator/dashboard", array(
            'css' => $this->asset->css(array('uikit', 'style', 'font-awesome',"table")),
             'js' => $this->asset->js(array('jquery', 'uikit', 'moment')),
                    'component_menu' => $this->component->get_navigation(),
              "component" =>  $this->load->view("component/student/student",$data,true) ),true)));
        
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
    
    public function action_edit($id, $action = '')      
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
            'component' => $this->load->view('component/student/edit', array(
                'stud_id' => $id,
                'stud_content' => $this->dbmodel->get_stud_info($id),
                  
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