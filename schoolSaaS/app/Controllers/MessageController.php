<?php

namespace App\Controllers;

use App\Models\MessageModel;

class MessageController extends BaseController
{
    /**
     * Display all messages.
     */
    public function index()
    {
        $model = new MessageModel();
        $data['messages'] = $model->findAll();
        return view('messages/index', $data);
    }

    /**
     * Create a new message.
     */
    public function create()
    {
        $model = new MessageModel();
        $data = $this->request->getPost();
        $model->save($data);
        return redirect()->to('/messages');
    }

    /**
     * Update an existing message.
     */
    public function update($id)
    {
        $model = new MessageModel();
        $data = $this->request->getPost();
        $model->update($id, $data);
        return redirect()->to('/messages');
    }

    /**
     * Delete a message.
     */
    public function delete($id)
    {
        $model = new MessageModel();
        $model->delete($id);
        return redirect()->to('/messages');
    }
}