<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateUsersTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 23 June, 2024 11:40:33 PM
 */

class CreateUsersTable extends Migration
{
    public function up()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            
		'id' => [
			'type' => 'INT',
			'constraint' => 11,
			'null' => false,
			'auto_increment' => true,
		],
		'name' => [
			'type' => 'VARCHAR',
			'constraint' => 80,
			'null' => false,
		],
		'username' => [
			'type' => 'VARCHAR',
			'constraint' => 30,
			'null' => false,
		],
		'password' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => false,
		],
		'role' => [
			'type' => 'ENUM',
			'constraint' => [ 'admin', 'user'],
			'null' => false,
		],
		'created_at' => [
			'type' => 'DATETIME',
			'null' => false,
		],
		'updated_at' => [
			'type' => 'DATETIME',
			'null' => false,
		],
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id');




        // Create Table ...
        $this->forge->createTable('users');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('users');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}