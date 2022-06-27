<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\WishList;

class Income extends Model
{
    use HasFactory;



    /**
     * The belongUser the Income
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function belongUser()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get all of the comments for the Income
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /*
     public function wishs()
    {
        return $this->hasMany(WishList::class, 'income_id', 'id');
    }

    */
}
