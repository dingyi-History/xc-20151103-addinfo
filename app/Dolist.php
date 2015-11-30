<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dolist extends Model
{
    protected $table = 'dolists';
    protected $fillable = [
        'addman_id',
        'info_id',
        'docontent',
        'dotime'
    ];
}
