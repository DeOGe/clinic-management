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
    
    protected $table = 'admin_profiles';
     /**
     * Get all of the post's comments.
     */
    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }
    // protected static function newFactory()
    // {
    //     return \Modules\Authentication\Database\factories\AdminProfileFactory::new();
    // }
}
