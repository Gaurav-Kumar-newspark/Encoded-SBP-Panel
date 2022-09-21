<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tblfirebase_setting extends Migration
{
    public function up()
    {
        $fields = array(
        
            "setting" => array(
                'type'           => 'TEXT',
                'null'           => true,
                ),
            "value" => array(
                'type'           => 'TEXT',
                'null'           => true,
                ),               
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_firebase_setting', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_firebase_setting', true);
    }
}
