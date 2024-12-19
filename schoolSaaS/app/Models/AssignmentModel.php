<?php

namespace App\Models;

use CodeIgniter\Model;

class AssignmentModel extends Model
{
    protected $table = 'assignments';

    protected $primaryKey = 'AssignmentID';

    protected $allowedFields = [
        'CourseID',
        'Title',
        'Description',
        'DueDate',
        'CreatedAt',
        'UpdatedAt'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'CreatedAt';

    protected $updatedField = 'UpdatedAt';

    /**
     * Get all assignments for a user based on their enrolled courses
     *
     * @param int $userID
     * @return array
     */
    public function getAssignmentsByStudentStatus($userID)
    {
        return $this
            ->select('assignments.AssignmentID,
             assignments.Title,
             assignments.Description,
             assignments.DueDate,
             c.Name as CourseName,
             s.Name as SchoolName,
             u.FirstName as StudentFirstName,
             u.LastName as StudentLastName,
             sub.Grade,
             sub.Feedback,
             IF(sub.SubmissionID IS NOT NULL, "Sent", "Pending") as SubmissionStatus')
            ->join('courses c', 'assignments.CourseID = c.CourseID')
            ->join('schoolusers su', 'su.SchoolID = c.SchoolID')
            ->join('users u', 'su.UserID = u.UserID')
            ->join('schools s', 'c.SchoolID = s.SchoolID')
            ->join('submissions sub', 'sub.AssignmentID = assignments.AssignmentID AND sub.StudentID = u.UserID', 'left') // LEFT JOIN for check submissions
            ->where('su.Role', 'Student')
            ->where('u.UserID', $userID)
            ->orderBy('assignments.DueDate', 'ASC')
            ->findAll();

    }
}