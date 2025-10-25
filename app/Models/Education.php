<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'profile_id',
        'institution',
        'degree',
        'type',
        'start_date',
        'end_date',
        'description',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function links()
    {
        return $this->morphMany(Link::class, 'linkable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
