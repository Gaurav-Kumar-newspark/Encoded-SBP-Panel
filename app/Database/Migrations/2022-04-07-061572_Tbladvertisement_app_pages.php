<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Tbladvertisement_app_pages extends Migration
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
            
            "add_id" => array(
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'null' => true,
            ),

            "pages" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),

            "position" => array(
                'type' => 'TEXT',
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
        $this->forge->createTable('tbl_advertisement_app_pages', true);

    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_advertisement_app_pages', true);
    }
}