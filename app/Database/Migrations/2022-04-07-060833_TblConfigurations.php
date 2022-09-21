<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblConfigurations extends Migration
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
            "settings" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 250,
                'null'     => true,
                ),
            "value" => array(
                'type'           => 'TEXT',
                'null'           => true,
                ),
            "created_at" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => true,
                ),                 
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_configurations', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_configurations', true);
    }
}
