<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

test('a guest cannot read the current user', function () {
    $this->getJson('/api/user')->assertUnauthorized();
});

test('an authenticated user can read their own profile', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $this->getJson('/api/user')
        ->assertOk()
        ->assertJsonPath('email', $user->email)
        ->assertJsonMissingPath('password');
});

test('the api is throttled', function () {
    Sanctum::actingAs(User::factory()->create());

    $this->getJson('/api/user')->assertHeader('X-RateLimit-Limit', 60);
});
