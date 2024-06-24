<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'website_name', 'phone_number1', 'phone_number2', 'email1', 'email2',
        'address', 'maps', 'logo', 'facebook_url', 'instagram_url', 'youtube_url',
        'header_business_hour', 'time_business_hour', 'created_at', 'updated_at'
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
        'website_name' => 'required|max_length[80]',
        'phone_number1' => 'required|max_length[15]',
        'phone_number2' => 'max_length[15]',
        'email1' => 'required|valid_email|max_length[80]',
        'email2' => 'valid_email|max_length[80]',
        'address' => 'required',
        'maps' => 'permit_empty',
        'logo' => 'required|max_length[80]',
        'facebook_url' => 'permit_empty|valid_url|max_length[128]',
        'instagram_url' => 'permit_empty|valid_url|max_length[128]',
        'youtube_url' => 'permit_empty|valid_url|max_length[128]',
        'header_business_hour' => 'required|max_length[100]',
        'time_business_hour' => 'required'
    ];

    protected $validationMessages = [
        'website_name' => [
            'required' => 'Website name is required',
            'max_length' => 'Website name cannot exceed 80 characters'
        ],
        'phone_number1' => [
            'required' => 'Phone number 1 is required',
            'max_length' => 'Phone number 1 cannot exceed 15 characters'
        ],
        'phone_number2' => [
            'max_length' => 'Phone number 2 cannot exceed 15 characters'
        ],
        'email1' => [
            'required' => 'Email 1 is required',
            'valid_email' => 'Email 1 must be a valid email',
            'max_length' => 'Email 1 cannot exceed 80 characters'
        ],
        'email2' => [
            'valid_email' => 'Email 2 must be a valid email',
            'max_length' => 'Email 2 cannot exceed 80 characters'
        ],
        'address' => [
            'required' => 'Address is required'
        ],
        'logo' => [
            'required' => 'Logo is required',
            'max_length' => 'Logo cannot exceed 80 characters'
        ],
        'facebook_url' => [
            'valid_url' => 'Facebook URL must be a valid URL',
            'max_length' => 'Facebook URL cannot exceed 128 characters'
        ],
        'instagram_url' => [
            'valid_url' => 'Instagram URL must be a valid URL',
            'max_length' => 'Instagram URL cannot exceed 128 characters'
        ],
        'youtube_url' => [
            'valid_url' => 'YouTube URL must be a valid URL',
            'max_length' => 'YouTube URL cannot exceed 128 characters'
        ],
        'header_business_hour' => [
            'required' => 'Header business hour is required',
            'max_length' => 'Header business hour cannot exceed 100 characters'
        ],
        'time_business_hour' => [
            'required' => 'Time business hour is required'
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
