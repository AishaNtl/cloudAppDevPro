<?php

namespace App\Controllers;

use App\Models\AssignmentModel;
use App\Models\SubmissionModel;
use App\Models\UserModel;

class SubmissionController extends BaseController
{
    /**
     * Display all submissions.
     */
    public function index($courseID, $assignmentID)
    {
        $submissionModel = new SubmissionModel();
        $assignmentModel = new AssignmentModel();
        $studentModel = new UserModel();

        $assignment = $assignmentModel->find($assignmentID);

        // Fetch all submissions related to the specific CourseID
        $submissions = $submissionModel
            ->getWithStudentNames($assignmentID);

        // Pass the submissions data to the view
        return view('submissions/index', [
            'submissions' => $submissions,
            'courseID' => $courseID,
            'assignment' => $assignment,
        ]);
    }

    /**
     * Create a new submission.
     */
    public function create($assignmentID)
    {
        $session = session();

        $model = new SubmissionModel();

        $data = $this->request->getPost();

        $data['AssignmentID'] = $assignmentID;
        $data['StudentID'] = $session->get('user_id');

        $model->save($data);
        return redirect()->to('/assignments');
    }

    /**
     * Update an existing submission.
     */
    public function update($id)
    {
        $model = new SubmissionModel();
        $data = $this->request->getPost();
        $model->update($id, $data);
        return redirect()->back();
    }

    /**
     * Delete a submission.
     */
    public function delete($id)
    {
        $model = new SubmissionModel();
        $model->delete($id);
        return redirect()->to('/submissions');
    }
}