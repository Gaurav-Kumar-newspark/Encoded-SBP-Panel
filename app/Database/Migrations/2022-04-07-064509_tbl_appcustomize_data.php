<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class tbl_appcustomize_data extends Migration
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
            "place" => array(
                'type'           => 'TEXT'
                
                ),
            "type" => array(
                'type'           => 'TEXT'
                
                ),
            "value" => array(
                'type'           => 'TEXT'
                
                ),
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_appcustomize_data', true);

    }

    public function down()
    {
        //
    }
}
