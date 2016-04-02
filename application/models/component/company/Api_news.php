<?php

class Api_news extends MY_Model {
     protected $_table_blank = 'news';
    protected $_table_image_content = 'news_content';
    
    
    public function api_get_content($id)
    { $query = $this->db->get_where($this->_table_image_content, array(
            'news_id' => $id,
            'img_lang' => lang_id()
        ));

        return $query->row_array();
        
    }
     public function api_get_text()
    {
         $this->db->order_by("news_id", "desc"); 
        $query = $this->db->get('news_content');
        
        return  $query->result_array();
        
    }
}