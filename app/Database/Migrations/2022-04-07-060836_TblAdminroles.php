<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;


class TblAdminroles extends Migration
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
            "name" => array(
                    'type'           => 'VARCHAR',
                    'constraint'     => 255,
                ),
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_adminroles', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_adminroles', true);
    }
}
