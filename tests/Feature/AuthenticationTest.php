<?php

use App\Models\User;

test('a visitor can register and land on the posts', function () {
    $this->post(route('register'), [
        'name' => 'Sam Lee',
        'email' => 'sam@studio.test',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])->assertRedirect(route('posts.index'));

    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', [
        'email' => 'sam@studio.test',
    ]);
});

test('a visitor can log in with the classroom password', function () {
    $author = User::factory()->create([
        'email' => 'alex@studio.test',
    ]);

    $this->post(route('login'), [
        'email' => 'alex@studio.test',
        'password' => 'password',
    ])->assertRedirect(route('posts.index'));

    $this->assertAuthenticatedAs($author);
});

test('login rejects an unknown password', function () {
    User::factory()->create([
        'email' => 'alex@studio.test',
    ]);

    $this->from(route('login'))
        ->post(route('login'), [
            'email' => 'alex@studio.test',
            'password' => 'wrong-password',
        ])
        ->assertRedirect(route('login'))
        ->assertSessionHasErrors([
            'email' => 'Those credentials do not match our records.',
        ]);

    $this->assertGuest();
});

test('logging out returns the author to the public posts', function () {
    $author = User::factory()->create();

    $this->actingAs($author)
        ->post(route('logout'))
        ->assertRedirect(route('posts.index'));

    $this->assertGuest();
});
