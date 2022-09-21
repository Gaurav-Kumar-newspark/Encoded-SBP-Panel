<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAdmin extends Migration
{
    public function up()
    {
        $fields = array(
        
            "id" => array(
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
                ),
            "firstname" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
                
                ),
            "lastname" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
                    
                ),
            "email" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
                    
                ),
            "phonenumber" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
                    
                ),
            "password" => array(
                'type'           => 'Text',
                'constraint'     => 255,
                'null'           => true,
                    
                ),
            "created_at" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => true,
                
                ),    
            "role" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'default'        =>  0,
                ),   
                 
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_admin', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_admin', true);
    }
}
