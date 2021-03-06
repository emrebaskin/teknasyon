<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    public $timestamps = false;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'image_url',
    ];

    /**
     * @return HasMany
     */
    public function sounds()
    {
        return $this->hasMany(Sound::class);
    }

}
