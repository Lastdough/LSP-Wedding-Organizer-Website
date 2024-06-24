<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateOrdersTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 23 June, 2024 11:40:33 PM
 */

class CreateOrdersTable extends Migration
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
		'package_id' => [
			'type' => 'INT',
			'constraint' => 11,
			'null' => false,
		],
		'name' => [
			'type' => 'VARCHAR',
			'constraint' => 80,
			'null' => false,
		],
		'email' => [
			'type' => 'VARCHAR',
			'constraint' => 80,
			'null' => false,
		],
		'phone_number' => [
			'type' => 'VARCHAR',
			'constraint' => 30,
			'null' => false,
		],
		'number_of_guests' => [
			'type' => 'INT',
			'constraint' => 11,
			'null' => false,
		],
		'wedding_date' => [
			'type' => 'DATE',
			'null' => false,
		],
		'status' => [
			'type' => 'ENUM',
			'constraint' => [ 'requested', 'approved', 'rejected'],
			'null' => false,
		],
		'user_id' => [
			'type' => 'INT',
			'constraint' => 11,
			'null' => true,
		],
		'created_at' => [
			'type' => 'DATETIME',
			'null' => false,
		],
		'updated_at' => [
			'type' => 'DATETIME',
			'null' => true,
		],
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id');

		$this->forge->addKey('package_id');
		$this->forge->addKey('user_id');


		$this->forge->addForeignKey('package_id','wedding_packages','id','RESTRICT','RESTRICT');
		$this->forge->addForeignKey('user_id','users','id','RESTRICT','RESTRICT');

        // Create Table ...
        $this->forge->createTable('orders');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('orders');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}