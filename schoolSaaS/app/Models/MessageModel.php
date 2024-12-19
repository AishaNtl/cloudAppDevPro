<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table = 'messages';

    protected $primaryKey = 'MessageID';

    protected $allowedFields = [
        'SenderID',
        'ReceiverID',
        'MessageText',
        'SentAt'
    ];

    protected $useTimestamps = false;
}