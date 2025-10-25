<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'full_name',
        'slug',
        'title',
        'location',
        'phone',
        'email',
        'bio',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
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
