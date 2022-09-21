<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblApidetails extends Migration
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

            "apikey" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "secret" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,

            ),
            "apilable" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "usename" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "password" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,

            ),

            "created_at" => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ),
            "created_by" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_apidetails', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_apidetails', true);
    }
}
