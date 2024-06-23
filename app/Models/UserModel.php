<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'name', 'username', 'password', 'role', 'created_at', 'updated_at'
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
        'name' => 'required|alpha_numeric_space|max_length[80]',
        'username' => 'required|alpha_numeric_space|max_length[30]|is_unique[users.username]',
        'password' => 'required|min_length[8]',
        'password_confirm' => 'required|matches[password]',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Name is required',
            'alpha_space' => 'Name must only contain alphabetic characters and spaces',
            'max_length' => 'Name cannot exceed 80 characters'
        ],
        'username' => [
            'required' => 'Username is required',
            'alpha_numeric_space' => 'Username must only contain alphanumeric characters and spaces',
            'max_length' => 'Username cannot exceed 30 characters',
            'is_unique' => 'Username already exists'
        ],
        'password' => [
            'required' => 'Password is required',
            'min_length' => 'Password must be at least 8 characters long'
        ],
        'password_confirm' => [
            'required' => 'Password confirmation is required',
            'matches' => 'Password confirmation does not match the password'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        unset($data['data']['password_confirm']);
        return $data;
    }

    protected $afterInsert    = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
