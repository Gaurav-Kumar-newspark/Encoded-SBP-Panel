<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Addannouncements extends Migration
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
            "created_on" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),          
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_addannouncements', true);

    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_addannouncements', true);
    }
}