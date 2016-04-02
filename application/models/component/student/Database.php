<?php

class Database extends MY_Model {

    protected $_component = 'student';
    protected $_table_blank = 'student';

    //protected $_table_image_content = 'news_content';

    public function get_news_name($id) {

        $query = $this->db->get_where('components', array('component_name' => $this->_component));
        if ($query->num_rows() != 0) {
            return $this->db->get_where($this->_table_blank, array('news_id' => $id))->row_array();
        }
    }

    public function create_news() {
        $this->db->insert($this->_table_blank, array(
            'news_name' => $this->input->post('news_name', true)
        ));
        $id = $this->db->insert_id();
        if ($this->config->item('multi_language_enable') === true AND count($this->config->item('multi_language')) > 0) {
            $languages = $this->config->item('multi_language');
            foreach ($languages as $key => $value) {
                $this->db->insert($this->_table_image_content, array(
                    'news_id' => $id,
                    'news_text' => '',
                    'news_title' => '',
                    'news_date' => '',
                    'news_time' => '',
                    'img_full_path' => '',
                    'img_lang' => $key
                ));
            }
        } else {
            $this->db->insert($this->_table_image_content, array(
                'news_id' => $id,
                'news_text' => '',
                'news_title' => '',
                'news_date' => '',
                'news_time' => '',
                'img_full_path' => '',
                'img_lang' => lang_id()
            ));
        }
    }
    public function get_fac(){
       $res = $this->db->get_where("moderator",array("user_name"=>  $this->session->userdata('modername')))->row_array();
        return $res['id_faculity'];
    }
    public function get_students( $sort="" , $page ) {
        //var_dump($sort);
        $query ="";
        $fc_code = $this->get_fac();
        
        $query = $this->db->get_where('components', array('component_name' => $this->_component));
        
        if ($query->num_rows() > 0) {
            
            switch ($sort){
            case "alpha" :
                $query = $this->db->query(
                    "SELECT * FROM $this->_table_blank WHERE `fc_code`= $fc_code ORDER BY `family` <'а',`family` LIMIT $page ,16 "
                    )->result_array();
            
                break;
            default :
                 $query = $this->db->query(
                    "SELECT * FROM $this->_table_blank WHERE `fc_code`= $fc_code  LIMIT $page ,16 "
                    )->result_array();
                break;
        }
            
            
            return $query;
        }
    }
    public function all_student(){
        $fc_code = $this->get_fac();
        $query = $this->db->get_where($this->_table_blank, array("fc_code"=>$fc_code));
        return $query->num_rows();
    }

    public function get_stud_info($id) {
        
        $result = $this->db->get_where($this->_component, array("id_student"=>$id))->row_array();


        return $result;
    }

    public function news_content_edit() {
        $this->db->where('news_content_id', $this->input->post('news_content_id'));
        $this->db->where('img_lang', $this->input->post('img_lang'));
        $this->db->update($this->_table_image_content, array(
            'news_title' => $this->input->post('news_title_' . $this->input->post('img_lang')),
            'news_text' => $this->input->post('news_text_' . $this->input->post('img_lang')),
            'news_preloader' => $this->input->post('news_preloader_' . $this->input->post('img_lang')),
            'news_date' => date('d/m/Y'),
            'news_time' => date('H:i:s'),
        ));
    }

    public function img_edit($url) {
        $this->db->where('news_content_id', $this->input->post('news_content_id'));
        $this->db->where('img_lang', $this->input->post('img_lang'));
        $this->db->update($this->_table_image_content, array(
            'img_full_path' => $url,
        ));
    }

    public function news_delete($id) {
        $this->db->delete($this->_table_blank, array('news_id' => $id));
        $this->db->delete($this->_table_image_content, array('news_id' => $id));
    }

}
