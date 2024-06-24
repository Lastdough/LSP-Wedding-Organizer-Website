<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use ReflectionException;

/**
 * Short description of this class usages
 * @class MigrationsSeeder
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Seeds
 * @extend CodeIgniter\Database\Seeder
 * @generated_at 23 June, 2024 11:41:05 PM
 */

class MigrationsSeeder extends Seeder
{
    /**
     * @throws ReflectionException
     */
    public function run(): void
    {
        // Table Data ...
        $migrations = [
        ];


        // Cleaning up the table before seeding ...
        $this->db->table('migrations')->truncate();

        //Using Query Builder Class ...
        try {
        $this->db->table('migrations')->insertBatch($migrations);
        } catch (ReflectionException $e) {
            throw new ReflectionException($e->getMessage());
        }
    }
}
