<?php

namespace App\Models;

use CodeIgniter\Model;

class WeddingPackageModel extends Model
{
    protected $table = 'wedding_packages';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'image', 'package_name', 'description', 'price', 'capacity', 'status_publish',
        'user_id', 'created_at', 'updated_at'
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
        'package_name' => 'required|string|max_length[80]',
        'description' => 'required|string',
        'price' => 'required|integer',
        'capacity' => 'required|integer',
        'picture' => 'uploaded[picture]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]|max_size[picture,2048]'
    ];

    protected $validationMessages = [
        'package_name' => [
            'required' => 'The Package Name field is required.',
            'max_length' => 'The Package Name field cannot exceed 80 characters.'
        ],
        'description' => [
            'required' => 'The Description field is required.'
        ],
        'price' => [
            'required' => 'The Price field is required.',
            'integer' => 'The Price field must be a valid number.'
        ],
        'capacity' => [
            'required' => 'The Capacity field is required.',
            'integer' => 'The Capacity field must be a valid number.'
        ],
        'picture' => [
            'uploaded' => 'The Picture field is required.',
            'is_image' => 'The Picture field must contain an image.',
            'mime_in' => 'The Picture field must be a valid image type (jpg, jpeg, png).',
            'max_size' => 'The Picture field must not exceed 2MB in size.'
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
