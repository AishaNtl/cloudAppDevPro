<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'UserID';

    protected $allowedFields = [
        'FirstName',
        'LastName',
        'Email',
        'PasswordHash',
        'Role',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'CreatedAt';

    protected $updatedField = 'UpdatedAt';
}
