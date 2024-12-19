<?php

namespace App\Controllers;

use App\Models\SchoolModel;
use App\Models\SchoolUserModel;
use App\Models\UserModel;

class StudentController extends BaseController
{
    /**
     * Display all students.
     */
    public function index()
    {

        $model = new SchoolModel();

        $schools = $model->findAll();

        $data['schools'] = $schools;

        return view('students/index', $data);
    }

    /**
     * Create a new student view.
     */
    public function new($schoolID)
    {
        $schoolModel = new SchoolModel();

        $school = $schoolModel->find($schoolID);

        $data['school'] = $school;

        return view('students/create', $data);
    }

    /**
     * Create a new student.
     */
    public function create($schoolID)
    {
        $model = new UserModel();
        $schoolUserModel = new SchoolUserModel();

        $data = $this->request->getPost();

        // Defines a default password
        $data['PasswordHash'] = password_hash('Password1*', PASSWORD_BCRYPT);
        $data['Role'] = 'Student';

        $userInserted = $model->save($data);

        $systemUserID = $model->getInsertID();

        $linkedSchoolUser['SchoolID'] = $schoolID;
        $linkedSchoolUser['UserID'] = $systemUserID;
        $linkedSchoolUser['Role'] = 'Student';

        $schoolUserModel->save($linkedSchoolUser);


        return redirect()->to('/schools/' . $schoolID . '/students');
    }

    /**
     * Read students by SchoolID
     * @param $schoolID
     * @return string
     */
    public function read($schoolID)
    {
        $model = new SchoolUserModel();
        $schoolModel = new SchoolModel();

        $students = $model->getWithFullNames($schoolID);
        $school = $schoolModel->find($schoolID);

        $data['students'] = $students;
        $data['school'] = $school;

        return view('students/index', $data);

    }

    /**
     * Create a new student.
     */
    public function readByID($schoolID, $studentID)
    {
        $model = new UserModel();
        $schoolModel = new SchoolModel();

        $school = $schoolModel->find($schoolID);
        $student = $model->find($studentID);


        $data['student'] = $student;
        $data['school'] = $school;

        return view('students/update', $data);

    }

    /**
     * Update an existing student.
     */
    public function update($schoolID,$studentID)
    {
        $model = new UserModel();
        $data = $this->request->getPost();
        $model->update($studentID, $data);
        return redirect()->to('/schools/'. $schoolID.'/students');
    }

    /**
     * Delete a student.
     */
    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/students');
    }
}