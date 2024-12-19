<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'courses';

    protected $primaryKey = 'CourseID';

    protected $allowedFields = [
        'SchoolID',
        'Name',
        'Description',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'CreatedAt';

    protected $updatedField = 'UpdatedAt';

    /**
     * @param $courseId
     * @return array|object|null
     */
    public function getCourseWithSchoolName($courseId)
    {
        return $this->select('courses.*, schools.FullName as SchoolFullName')
            ->join('schools', 'schools.SchoolID = courses.SchoolID')
            ->where('courses.CourseID', $courseId)
            ->first();
    }

    /**
     * @return array
     */
    public function getCoursesWithSchoolName(): array
    {
        return $this->select('courses.*, schools.Name as SchoolFullName')
            ->join('schools', 'schools.SchoolID = courses.SchoolID')
            ->findAll();
    }

    /**
     * @param $schoolID
     * @return array
     */
    public function getCoursesWithSchoolNameBySchoolID($schoolID): array
    {
        return $this->select('courses.*, schools.FullName as SchoolFullName')
            ->join('schools', 'schools.SchoolID = courses.SchoolID')
            ->where('courses.SchoolID', $schoolID)
            ->findAll();
    }
}