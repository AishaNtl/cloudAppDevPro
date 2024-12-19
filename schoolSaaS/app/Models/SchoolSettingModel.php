<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolSettingModel extends Model
{
    protected $table = 'schoolsettings';

    protected $primaryKey = 'SettingID';

    protected $allowedFields = [
        'SchoolID',
        'SettingKey',
        'SettingValue'
    ];
}
