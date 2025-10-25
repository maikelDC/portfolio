<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'url',
        'label',
        'type',
        'icon_path',
        'linkable_id',
        'linkable_type',
    ];

    public function linkable()
    {
        return $this->morphTo();
    }
}
