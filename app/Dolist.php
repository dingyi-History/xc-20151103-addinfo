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

    public function user()
    {
        return $this->belongsTo('App\User', 'addman_id', 'id');
    }

    public function scopeOrdered($query)
    {
        $query->OrderBy('dolists.id', 'desc');
    }
}
