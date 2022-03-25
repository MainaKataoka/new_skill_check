<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'name',
        'email',
        'phone',
        'body',
    ];

}
