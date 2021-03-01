<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
    ];

    //Returns a boolean if the user has already liked the post or not:
    public function likedBy(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }

    //Returns a boolean if the user is the creator of the post:
    // public function ownedBy(User $user) {
    //     return $user->id === $this->user_id;
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function likes() {
        return $this->hasMany(Like::class);
    }
}