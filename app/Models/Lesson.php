<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' ,'title', 'body'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'lesson_tags');
    }
}
