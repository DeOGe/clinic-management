<?php

namespace Modules\Authentication\Repositories;

use Modules\Authentication\Entities\AdminProfile;

class AdminProfileRepository extends AdminProfile
{
    public static function createUser($profile, $credentials)
    {
        $profile = self::create($profile);
        $user = $profile->user()->create($credentials);
        return $user;
    }
}