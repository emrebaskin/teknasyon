<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{

    protected $table = 'versions';

    protected $fillable = [
        'version_code',
        'force_update',
        'platform',
        'language_version_code'
    ];

}
