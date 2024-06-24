<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use ReflectionException;

/**
 * Short description of this class usages
 * @class UsersSeeder
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Seeds
 * @extend CodeIgniter\Database\Seeder
 * @generated_at 23 June, 2024 11:41:05 PM
 */

class UsersSeeder extends Seeder
{
    /**
     * @throws ReflectionException
     */
    public function run(): void
    {
        // Table Data ...
        $users = [
            ['id' => '1','name' => 'admin','username' => 'admin','password' => '$2y$10$4VRP1Nwgp8HHYjK6w1epBOBUrtBXwC9TKQ3CYSgRNFBqkD47gWZVK','role' => 'admin','created_at' => '2024-06-23 18:10:11','updated_at' => '2024-06-23 18:10:11',],
            ['id' => '2','name' => 'AlphaNumber','username' => '10120005','password' => '$2y$10$iJQXI4F9Te4P1CNOmIdQWulbOOS5A/XRqq/yUSL4Yc0HyDUjKlGmi','role' => '','created_at' => '2024-06-23 22:09:28','updated_at' => '2024-06-23 22:09:28',],
        ];


        // Cleaning up the table before seeding ...
        $this->db->table('users')->truncate();

        //Using Query Builder Class ...
        try {
        $this->db->table('users')->insertBatch($users);
        } catch (ReflectionException $e) {
            throw new ReflectionException($e->getMessage());
        }
    }
}
