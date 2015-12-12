<?php

class Setup extends MY_Model {

    protected $_table_blank = 'news';
     protected $_table_img = 'news_content';
    protected $_fields1 = array();
    protected $_fields2 = array();
    protected $version = '1.0.0';

    public function install($component, $reinstall = false)
    { $this->load->dbforge();
        if($reinstall === true)
        {
            $this->dbforge->drop_table($this->_table_blank);
            $this->dbforge->drop_table($this->_table_img);
        }

        $this->_fields1 = array(
            'news_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            
          )
            , 'news_name' =>array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            )
        );

        $this->dbforge->add_field($this->_fields1);
        $this->dbforge->add_key('news_id', TRUE);
        $this->dbforge->create_table($this->_table_blank, true, array('ENGINE' => 'InnoDB'));
        
		$this->_fields2 = array(
                'news_content_id' => array(
                'type' => 'INT',
                'constraint' => 255,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
		'news_id' => array(
                'type' => 'INT',
                'constraint' => 255,
                'unsigned' => TRUE
            ),
                'news_title' => array(
                'type' => 'TEXT',
                
            ),
		'news_text' => array(
                'type' => 'TEXT'
            ),
		'news_date' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
            ),
               'news_time' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
            ),
                'img_full_path' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
            ),
                    
		'img_lang' => array(
                'type' => 'VARCHAR',
                'constraint' => '2',
            ),
        );

        $this->dbforge->add_field($this->_fields2);
        $this->dbforge->add_key('news_content_id', TRUE);
        $this->dbforge->create_table($this->_table_img, true, array('ENGINE' => 'InnoDB'));


        $this->db->insert('components', array('component_name' => $component, 'component_version' => $this->version));
    }
   

    
   
}
