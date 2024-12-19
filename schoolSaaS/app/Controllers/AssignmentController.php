<?php

namespace App\Controllers;

use App\Models\AssignmentModel;
use App\Models\CourseModel;

class AssignmentController extends BaseController
{
    /**
     * Display all assignments.
     */
    public function index($courseID): string
    {
        $assignmentModel = new AssignmentModel();
        $courseModel = new CourseModel();

        // Fetch all assignments related to the specific CourseID
        $assignments = $assignmentModel
            ->where('courseID', $courseID)
            ->findAll();

        $course = $courseModel->find($courseID);

        // Pass the assignments data to the view
        return view('assignment/index', [
            'assignments' => $assignments,
            'course' => $course
        ]);
    }

    public function my_assignments(): string
    {
        $session = session();

        $userID = $session->get('user_id');

        $assignmentModel = new AssignmentModel();
        $courseModel = new CourseModel();

        // Fetch all assignments related to the specific CourseID
        $assignments = $assignmentModel->getAssignmentsByStudentStatus($userID);

        // Pass the assignments data to the view
        return view('assignment/my_assignments', [
            'assignments' => $assignments
        ]);
    }

    /**
     * Create a new assignment view.
     */
    public function new($courseID): string
    {
        $courseModel = new CourseModel();
        $data['course'] = $courseModel->find($courseID);

        return view('assignment/create', $data);
    }

    /**
     * Create a new assignment.
     */
    public function create($courseID): \CodeIgniter\HTTP\RedirectResponse
    {
        $model = new AssignmentModel();
        $data = $this->request->getPost();
        $data['CourseID'] = $courseID;
        $model->save($data);
        return redirect()->to('/courses/'.$courseID.'/assignments');
    }

    /**
     * Update an existing assignment view.
     */
    public function edit($courseID, $assignmentID): string
    {
        $model = new AssignmentModel();
        $courseModel = new CourseModel();

        $assignment = $model->find($assignmentID);
        $course = $courseModel->find($courseID);

        $data['assignment'] = $assignment;
        $data['course'] = $course;

        return view('assignment/update', $data);
    }
    /**
     * Update an existing assignment.
     */
    public function update($courseID, $assignmentID): \CodeIgniter\HTTP\RedirectResponse
    {
        $model = new AssignmentModel();
        $data = $this->request->getPost();
        $data['CourseID'] = $courseID;
        $model->update($assignmentID, $data);
        return redirect()->to('/courses/'.$courseID.'/assignments');
    }

    /**
     * Delete an assignment.
     */
    public function delete($courseID, $assignmentID): \CodeIgniter\HTTP\RedirectResponse
    {
        $model = new AssignmentModel();
        $model->delete($assignmentID);
        return redirect()->to('/courses/'.$courseID.'/assignments');
    }
}