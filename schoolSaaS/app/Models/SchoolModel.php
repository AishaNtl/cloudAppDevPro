<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolModel extends Model
{
    protected $table = 'schools';

    protected $primaryKey = 'SchoolID';

    protected $allowedFields = [
        'Name',
        'Address',
        'City',
        'State',
        'Country',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'CreatedAt';

    protected $updatedField = 'UpdatedAt';

}