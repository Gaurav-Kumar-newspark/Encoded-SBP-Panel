<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbl_license extends Migration
{
    public function up()
    {
        $fields = array(
            "settings" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 250,
                'null'     => true,
                ),
            "value" => array(
                'type'           => 'TEXT',
                'null'           => true,
                )               
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_license', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_license', true);
    }
}
