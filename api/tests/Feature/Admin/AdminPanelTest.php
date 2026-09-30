<?php

test('the admin login page is reachable', function () {
    $this->get('/admin/login')->assertOk();
});

test('a guest is redirected from the admin panel to the login page', function () {
    $this->get('/admin')->assertRedirect('/admin/login');
});
