<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    public function user()
    {
     return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
     return $this->likes->contains('user_id', $user->id);
    }

    public function retweets()
    {
        return $this->hasMany(Retweet::class);
    }

     public function isRetweetedBy(User $user)
    {
     return $this->retweets->contains('user_id', $user->id);
    }

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class);
    }
}
