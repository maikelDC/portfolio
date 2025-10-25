<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'type',
        'icon_path',
    ];

    public function profiles()
    {
        return $this->morphedByMany(Profile::class, 'taggable');
    }

    public function projects()
    {
        return $this->morphedByMany(Project::class, 'taggable');
    }

    public function educations()
    {
        return $this->morphedByMany(Education::class, 'taggable');
    }
}
