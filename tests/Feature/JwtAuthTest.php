<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JwtAuthTest extends TestCase
{
    use RefreshDatabase;

    public function testLoginIssuesATokenThatAuthorizesAProtectedRoute(): void
    {
        $role = new Role();
        $role->name = 'member';
        $role->save();

        $user = new User();
        $user->name = 'Ada Lovelace';
        $user->email = 'ada@example.com';
        $user->password = bcrypt('secret-pass');
        $user->role_id = $role->id;
        $user->save();

        $login = $this->postJson('/api/v1/auth/login', [
            'email' => 'ada@example.com',
            'password' => 'secret-pass',
        ]);

        $login->assertOk();
        $token = $login->json('access_token');
        $this->assertNotEmpty($token);
        $login->assertJsonPath('token_type', 'bearer');
        $login->assertJsonPath('user.email', 'ada@example.com');

        // jwt-auth caches the parsed token on a singleton. A later request in
        // this process must clear it, which PHP-FPM does by ending the process.
        $this->resetJwt();

        $this->postJson('/api/v1/auth/me')->assertUnauthorized();

        $this->resetJwt();

        $me = $this->withHeader('Authorization', 'Bearer '.$token)
            ->postJson('/api/v1/auth/me');

        $me->assertOk();
        $me->assertJsonPath('email', 'ada@example.com');

        $this->resetJwt();

        $refresh = $this->withHeader('Authorization', 'Bearer '.$token)
            ->postJson('/api/v1/auth/refresh');

        $refresh->assertOk();
        $this->assertNotEmpty($refresh->json('access_token'));
    }

    private function resetJwt(): void
    {
        app('tymon.jwt')->unsetToken();
        auth()->forgetGuards();
    }
}
