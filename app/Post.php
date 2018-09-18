<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];

    /**
     * Returns formatted created_at date
     * 
     * @return string
     */
    public function createdAt() {
        return $this->created_at->toFormattedDateString();
    }
}
