<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Tblannouncement_track extends Migration
{
    public function up()
    {
        $fields =   array(
                
            "id" => array(
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
                ),
            "announcement_id" => array(
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'null' => true,
                ),
            "device_id" => array(
                'type' => 'TEXT',
                'null' => true,
                ),
            "seen_time" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),          
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_announcement_track', true);

    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_announcement_track', true);
    }
}