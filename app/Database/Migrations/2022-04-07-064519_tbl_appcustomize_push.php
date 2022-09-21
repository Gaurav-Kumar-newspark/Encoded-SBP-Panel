<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class tbl_Appcustomization_push extends Migration
{
    public function up()
    {
        $fields =   array(
                
            "id" => array(
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
                ),
            "ip" => array(
                'type'           => 'TEXT'
                
                ),
            "pushed_by" => array(
                'type'           => 'TEXT'
                
                ),
            "pushed_by" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
                    
            ),
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_appcustomization_push', true);

    }

    public function down()
    {
        //
    }
}
