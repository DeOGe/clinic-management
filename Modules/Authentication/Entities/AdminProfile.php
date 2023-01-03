<?php

namespace Modules\Authentication\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name'
    ];
    
    // protected static function newFactory()
    // {
    //     return \Modules\Authentication\Database\factories\AdminProfileFactory::new();
    // }
}
