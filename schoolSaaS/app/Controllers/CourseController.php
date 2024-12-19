<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\SchoolModel;

class CourseController extends BaseController
{
    /**
     * Display all courses.
     */
    public function index()
    {
        $model = new CourseModel();
        $data['courses'] = $model->getCoursesWithSchoolName();
        return view('courses/index', $data);
    }

    /**
     * Create a new Course.
     */
    public function new()
    {
        $schoolModel = new SchoolModel();
        $schools = $schoolModel->findAll(); // Fetch all schools

        $course = [];
        return view('courses/create', [
            'schools' => $schools,
            'course' => $course,
        ]);
    }

    /**
     * @param $courseID
     * @return \CodeIgniter\HTTP\RedirectResponse|string
     */
    public function edit($courseID)
    {
        $model = new CourseModel();
        $schoolModel = new SchoolModel();

        // Retrieve the course data by ID
        $course = $model->find($courseID);

        // Retrieve the list of schools
        $schools = $schoolModel->findAll();

        // If the course doesn't exist, redirect or show an error
        if (!$course) {
            return redirect()->to('/courses')->with('error', 'Course not found');
        }

        // Pass course data to the view
        return view('courses/update', [
            'course' => $course,
            'schools' => $schools,
            'errors' => session()->getFlashdata('errors') // Flashdata can be used to pass errors
        ]);
    }

    /**
     * Create a new course.
     */
    public function create()
    {
        $model = new CourseModel();

        $data = $this->request->getPost();
        $model->save($data);
        return redirect()->to('/courses');
    }

    /**
     * Update an existing course.
     */
    public function update($id)
    {
        $model = new CourseModel();
        $data = $this->request->getPost();
        $model->update($id, $data);
        return redirect()->to('/courses');
    }

    /**
     * Delete a course.
     */
    public function delete($id)
    {
        $model = new CourseModel();
        $model->delete($id);
        return redirect()->to('/courses');
    }
}