<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSmtp extends Migration
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
            "fromemail" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'     => true,
                ),
            "smtphost" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'     => true,
                ),
            "smtpport" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'     => true,
                ),
            "smtpuser" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'     => true,
                ),
            "smtppass" => array(
                'type'           => 'Text',
                'constraint'     => 255,
                'null'     => true,
                ),
            "smtpcrypto" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'     => true,
                ),           
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_smtp', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_smtp', true);
    }
}
