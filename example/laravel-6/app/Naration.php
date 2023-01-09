<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
# php artisan make:observer NarationObserver --model=Naration
class Naration extends Model
{
    protected $table = 'narations';
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'subject_id', 'chapter_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];
}
