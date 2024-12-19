<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseTeacherModel extends Model
{
    protected $table = 'courseteachers';

    protected $primaryKey = 'CourseTeacherID';

    protected $allowedFields = [
        'CourseID', 'TeacherID'
    ];
}