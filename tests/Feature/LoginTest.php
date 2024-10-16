<?php

use App\Models\User;

it('[api] user can login', function () {

    $user =  User::create([
        'name' => 'root',
        'username' => 'root',
        'email' => 'root@example.com',
        'password' => bcrypt('password'),
    ]);

    $loginResponse = $this->postJson('/api/login', [
        'username' => $user->username,
        'password' => 'password',
    ])->assertOk();

    $loginResponse->assertJsonStructure([
        'success',
        'data' => [
            'token',
        ],
        'message',
        'code',
    ]);

    $loginResponse->assertJsonPath('data.token', fn ($token) => ! empty($token));

});