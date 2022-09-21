<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblLoginattempts extends Migration
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
            "ip" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
                
                ),
            "attempts" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
                ),                 
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_loginattempts', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_loginattempts', true);
    }
}
