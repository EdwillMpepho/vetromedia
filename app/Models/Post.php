<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'title',
        'body',
        'rate',
    ];

    /**
     * ensure that each post belongs to a specific use
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
