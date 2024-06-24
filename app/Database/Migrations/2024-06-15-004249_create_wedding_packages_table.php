<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateWeddingPackagesTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 15 June, 2024 12:42:48 AM
 */

class CreateWeddingPackagesTable extends Migration
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
		],
		'image' => [
			'type' => 'MEDIUMBLOB',
			'null' => true,
		],
		'package_name' => [
			'type' => 'VARCHAR',
			'constraint' => 80,
			'null' => false,
		],
		'description' => [
			'type' => 'MEDIUMTEXT',
			'null' => false,
		],
		'price' => [
			'type' => 'INT',
			'constraint' => 11,
			'null' => false,
		],
		'capacity' => [
			'type' => 'INT',
			'constraint' => 11,
			'null' => false,
		],
		'status_publish' => [
			'type' => 'ENUM',
			'constraint' => [ 'publish', 'draft'],
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

		$this->forge->addKey('user_id');


		$this->forge->addForeignKey('user_id','users','id','RESTRICT','RESTRICT');

        // Create Table ...
        $this->forge->createTable('wedding_packages');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('wedding_packages');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}