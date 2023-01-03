<?php

namespace Modules\Authentication\Tests\Unit;

use Tests\TestCase;
use Modules\Authentication\Entities\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            'email' => 'featuretest@email.com',
            'password' => 'admin123'
        ];

        $user = User::create($data);

        $response = $this->post('api/authentication/login', $data);
        dd($response->json());
    }
}
