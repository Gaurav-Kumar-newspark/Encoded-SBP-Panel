<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblGroupname extends Migration
{
    public function up()
    {
        $fields = array(

            "id" => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ),

            "groupname" => array(        
                'type' => 'VARCHAR',        
                'constraint' => 255,
                'null' => true,
            ),
            "created_by" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,

            ),       
            "created_at" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),    
            "updated_on" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_groupname', true);

    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_groupname', true);
    }
}
