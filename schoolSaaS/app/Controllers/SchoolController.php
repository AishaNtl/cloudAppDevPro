<?php

namespace App\Controllers;

use App\Models\SchoolModel;

class SchoolController extends BaseController
{
    /**
     * Display all schools.
     */
    public function index()
    {
        $model = new SchoolModel();
        $data['schools'] = $model->findAll();
        return view('schools/index', $data);
    }

    /**
     * Create a new school.
     */
    public function new()
    {
        return view('schools/create');
    }

    /**
     * Create a new school.
     */
    public function create()
    {
        $model = new SchoolModel();
        $data = $this->request->getPost();
        $model->save($data);
        return redirect()->to('/schools');
    }

    /**
     * Update an existing school.
     */
    public function edit($id)
    {
        $model = new SchoolModel();

        $school = $model->find($id);

        $data['school'] = $school;

        return view('schools/update', $data);
    }

    /**
     * Update an existing school.
     */
    public function update($id)
    {
        $model = new SchoolModel();
        $data = $this->request->getPost();
        $model->update($id, $data);
        return redirect()->to('/students');
    }

    /**
     * Delete a school.
     */
    public function delete($id)
    {
        $model = new SchoolModel();
        $model->delete($id);
        return redirect()->to('/schools');
    }
}