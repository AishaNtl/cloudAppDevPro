<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmissionModel extends Model
{
    protected $table = 'submissions';

    protected $primaryKey = 'SubmissionID';

    protected $allowedFields = [
        'AssignmentID',
        'StudentID',
        'SubmissionFile',
        'Grade',
        'Feedback',
        'SubmittedAt'
    ];

    protected $useTimestamps = false;

    /**
     * @param $assignmentID
     * @return array
     */
    public function getWithStudentNames($assignmentID): array
    {
        // Join the 'submissions' table with the 'users' table on the 'StudentID'
        return $this->select('submissions.*, users.FirstName, users.LastName, users.Email')
                    ->join('users', 'users.UserID = submissions.StudentID')
                    ->where('submissions.AssignmentID', $assignmentID)
                    ->findAll();
    }
}