<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateSettingsTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 15 June, 2024 12:42:48 AM
 */

class CreateSettingsTable extends Migration
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
		'website_name' => [
			'type' => 'VARCHAR',
			'constraint' => 80,
			'null' => false,
		],
		'phone_number1' => [
			'type' => 'VARCHAR',
			'constraint' => 15,
			'null' => false,
		],
		'phone_number2' => [
			'type' => 'VARCHAR',
			'constraint' => 15,
			'null' => true,
		],
		'email1' => [
			'type' => 'VARCHAR',
			'constraint' => 80,
			'null' => false,
		],
		'email2' => [
			'type' => 'VARCHAR',
			'constraint' => 80,
			'null' => true,
		],
		'address' => [
			'type' => 'TEXT',
			'null' => false,
		],
		'maps' => [
			'type' => 'TEXT',
			'null' => true,
		],
		'logo' => [
			'type' => 'VARCHAR',
			'constraint' => 80,
			'null' => false,
		],
		'facebook_url' => [
			'type' => 'VARCHAR',
			'constraint' => 128,
			'null' => true,
		],
		'instagram_url' => [
			'type' => 'VARCHAR',
			'constraint' => 128,
			'null' => true,
		],
		'youtube_url' => [
			'type' => 'VARCHAR',
			'constraint' => 128,
			'null' => true,
		],
		'header_business_hour' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => false,
		],
		'time_business_hour' => [
			'type' => 'TEXT',
			'null' => false,
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




        // Create Table ...
        $this->forge->createTable('settings');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('settings');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}