<?php

namespace Modules\Authentication\Tests\Unit;

use Tests\TestCase;
use Modules\Authentication\Entities\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Authentication\Entities\AdminProfile;
use Modules\Authentication\Repositories\AdminProfileRepository;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $data = [
            'email' => 'featuretest@email.com',
            'password' => 'admin123'
        ];

        $user = User::create($data);

        $response = $this->post('api/authentication/login', $data);
        // dd($response->json());
        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_in'
            ]);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testMe()
    {
        $data = [
            'profile' => [
                'first_name' => 'jon',
                'last_name' => 'doe'
            ],
            'credentials' => [
                'email' => 'featuretest@email.com',
                'password' => 'admin123'
            ]
        ];

        $user = AdminProfileRepository::createUser($data['profile'], $data['credentials']);
        $this->actingAs($user);
        $response = $this->get('api/authentication/me');
        $response->assertStatus(200)
            ->assertJsonStructure([
                "email",
                "profile_id",
                "profile_type",
                "updated_at",
                "created_at",
                "id",
                "profile"
            ]);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLogout()
    {
        $data = [
            'profile' => [
                'first_name' => 'jon',
                'last_name' => 'doe'
            ],
            'credentials' => [
                'email' => 'featuretest@email.com',
                'password' => 'admin123'
            ]
        ];

        $user = AdminProfileRepository::createUser($data['profile'], $data['credentials']);
        $token = auth()->attempt($data['credentials']);
    
        $response = $this->withHeaders(['Authorization'=>'Bearer '.$token])
            ->post('api/authentication/logout');

        $response->assertStatus(200);
    }
}
