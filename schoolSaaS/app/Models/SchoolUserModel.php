<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolUserModel extends Model
{
    protected $table = 'schoolusers';

    protected $primaryKey = 'SchoolUserID';

    protected $allowedFields = [
        'SchoolID',
        'UserID',
        'Role',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'CreatedAt';

    protected $updatedField = 'UpdatedAt';

    // Method to get school users with their full names
    public function getWithFullNames($schoolID)
    {
        // Perform a join to the users table to get full names
        return $this->select('schoolusers.SchoolUserID, 
                                    schoolusers.SchoolID, schoolusers.UserID,
                                    schoolusers.Role,
                                    schoolusers.CreatedAt,
                                    schoolusers.UpdatedAt,
                                    users.FirstName,
                                    users.LastName')
                    ->join('users', 'schoolusers.UserID = users.UserID')
                    ->where('schoolusers.SchoolID', $schoolID)
                    ->findAll();
    }

}