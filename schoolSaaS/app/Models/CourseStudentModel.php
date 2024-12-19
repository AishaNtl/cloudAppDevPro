<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseStudentModel extends Model
{
    protected $table = 'coursestudents';

    protected $primaryKey = 'CourseStudentID';

    protected $allowedFields = [
        'CourseID',
        'StudentID'
    ];

}