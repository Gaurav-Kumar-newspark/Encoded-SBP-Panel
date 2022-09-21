<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Notifications extends Migration
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
            "title" => array(
                'type'           => 'TEXT',
                'constraint'     => 250,
                ),
            "text" => array(
                'type'           => 'TEXT',
                ),
            "imagepath" => array(
                'type'           => 'TEXT',
                ),
            "save" => array(
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
                ),
            "created_on" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),       
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_notifications', true);

    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_notifications', true);
    }
}