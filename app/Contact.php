<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'contact', 'deleted',
    ];


    public function isEliminado()
    {
        return $this->deleted == 1;
    }
    

}
