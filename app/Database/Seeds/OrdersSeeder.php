<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use ReflectionException;

/**
 * Short description of this class usages
 * @class OrdersSeeder
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Seeds
 * @extend CodeIgniter\Database\Seeder
 * @generated_at 23 June, 2024 11:41:05 PM
 */

class OrdersSeeder extends Seeder
{
    /**
     * @throws ReflectionException
     */
    public function run(): void
    {
        // Table Data ...
        $orders = [
        ];


        // Cleaning up the table before seeding ...
        $this->db->table('orders')->truncate();

        //Using Query Builder Class ...
        try {
        $this->db->table('orders')->insertBatch($orders);
        } catch (ReflectionException $e) {
            throw new ReflectionException($e->getMessage());
        }
    }
}
