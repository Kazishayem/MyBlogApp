<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id']; // Ensure user_id is fillable

    // Define the relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
