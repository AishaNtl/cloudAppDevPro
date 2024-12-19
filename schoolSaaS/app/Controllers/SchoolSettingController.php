<?php

namespace App\Controllers;

use App\Models\SchoolSettingModel;

class SchoolSettingController extends BaseController
{
    /**
     * Display all settings.
     */
    public function index()
    {
        $model = new SchoolSettingModel();
        $data['settings'] = $model->findAll();
        return view('settings/index', $data);
    }

    /**
     * Create a new message.
     */
    public function create()
    {
        $model = new SchoolSettingModel();
        $data = $this->request->getPost();
        $model->save($data);
        return redirect()->to('/settings');
    }

    /**
     * Update an existing setting.
     */
    public function update($id)
    {
        $model = new SchoolSettingModel();
        $data = $this->request->getPost();
        $model->update($id, $data);
        return redirect()->to('/settings');
    }

    /**
     * Delete a setting.
     */
    public function delete($id)
    {
        $model = new SchoolSettingModel();
        $model->delete($id);
        return redirect()->to('/settings');
    }
}