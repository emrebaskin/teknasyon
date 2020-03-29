<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sound extends Model
{
    public $timestamps = false;
    protected $table = 'sounds';
    protected $fillable = [
        'name',
        'sound_url',
        'length',
        'category_id',
    ];

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
