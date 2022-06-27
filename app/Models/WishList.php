<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Income;

class WishList extends Model
{
    use HasFactory;

    protected $table = 'wish_lists';


    /**
     * The roles that belong to the WishList
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function belongUser()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The roles that belong to the WishList
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

     /*
    public function belongWish()
    {
        return $this->belongsToMany(Income::class);
    }

    */
}
