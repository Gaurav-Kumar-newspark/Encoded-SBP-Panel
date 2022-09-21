<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Tbladvertisement extends Migration
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
            
            "title" => array(
                'type' => 'TEXT',
                'null' => true,
                ),

            "type" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),

            "filepath" => array(
                'type' => 'TEXT',
                'null' => true,
            ),
            "text" => array(
                'type' => 'TEXT',
                'null' => true,
                ),
            "status" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),  
            "redirect_link" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),  
            "created_on" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),  
            
            "updated_on" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),    
        );
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('tbl_advertisement', true);

    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_advertisement', true);
    }
}