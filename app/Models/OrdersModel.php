<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'package_id', 'name', 'email', 'phone_number', 'number_of_guests', 'wedding_date',
        'status', 'user_id', 'created_at', 'updated_at'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'package_id' => 'required|alpha_numeric',
        'name' => 'required|alpha_space|max_length[80]',
        'email' => 'required|valid_email|max_length[80]',
        'phone_number' => 'required|max_length[30]',
        'number_of_guests' => 'required|integer',
        'wedding_date' => 'required|valid_date',
        'status' => 'required|in_list[requested,approved,rejected]',
        'user_id' => 'required|integer'
    ];

    protected $validationMessages = [
        'package_id' => [
            'required' => 'Package ID is required',
            'alpha_numeric' => 'Package ID must be alphanumeric'
        ],
        'name' => [
            'required' => 'Name is required',
            'alpha_space' => 'Name must only contain alphabetic characters and spaces',
            'max_length' => 'Name cannot exceed 80 characters'
        ],
        'email' => [
            'required' => 'Email is required',
            'valid_email' => 'Email must be valid',
            'max_length' => 'Email cannot exceed 80 characters'
        ],
        'phone_number' => [
            'required' => 'Phone number is required',
            'max_length' => 'Phone number cannot exceed 30 characters'
        ],
        'number_of_guests' => [
            'required' => 'Number of guests is required',
            'integer' => 'Number of guests must be an integer'
        ],
        'wedding_date' => [
            'required' => 'Wedding date is required',
            'valid_date' => 'Wedding date must be a valid date'
        ],
        'status' => [
            'required' => 'Status is required',
            'in_list' => 'Status must be one of: requested, approved, rejected'
        ],
        'user_id' => [
            'required' => 'User ID is required',
            'integer' => 'User ID must be an integer'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
