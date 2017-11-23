<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'body', 'flagged_at'];

    /**
     * Get the user Gravatar by their email address.
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        return sprintf('https://www.gravatar.com/avatar/%s?s=100', md5($this->email));
    }
}
