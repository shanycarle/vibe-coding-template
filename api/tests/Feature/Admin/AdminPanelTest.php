<?php

use App\Models\User;

test('the admin login page is reachable', function () {
    $this->get('/admin/login')->assertOk();
});

test('a guest is redirected from the admin panel to the login page', function () {
    $this->get('/admin')->assertRedirect('/admin/login');
});

test('a user listed in ADMIN_EMAILS can enter the admin panel', function () {
    config(['app.admin_emails' => ['admin@example.com']]);
    $admin = User::factory()->create(['email' => 'Admin@Example.com']);

    $this->actingAs($admin)->get('/admin')->assertOk();
});

test('a user not listed in ADMIN_EMAILS is forbidden from the admin panel', function () {
    config(['app.admin_emails' => ['admin@example.com']]);
    $user = User::factory()->create(['email' => 'someone@example.com']);

    $this->actingAs($user)->get('/admin')->assertForbidden();
});
