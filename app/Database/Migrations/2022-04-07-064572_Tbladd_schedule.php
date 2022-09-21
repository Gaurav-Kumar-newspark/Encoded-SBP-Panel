<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Tbladd_schedule extends Migration
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
                'null' => true,
            ),

            "schedule_type" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "number" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ),
            "custom_recc" => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->createTable('tbl_add_schedule', true);

    }

    public function down()
    {
        //
        $this->forge->dropTable('tbl_add_schedule', true);
    }
}