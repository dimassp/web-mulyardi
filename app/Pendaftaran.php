<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';

    protected $guarded = [];

    public function ajaran()
    {
        return $this->belongsTo('App\Ajaran')->withDefault();
    }
}
