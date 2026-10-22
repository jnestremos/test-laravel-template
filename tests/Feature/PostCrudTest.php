<?php

use App\Models\Post;
use App\Models\User;

test('guests can read the post list and a post', function () {
    $post = Post::factory()->create([
        'title' => 'Public note',
        'body' => '<script>alert("xss")</script>',
    ]);

    $this->get(route('posts.index'))
        ->assertOk()
        ->assertSee('Public note');

    $this->get(route('posts.show', $post))
        ->assertOk()
        ->assertSee('<script>alert("xss")</script>')
        ->assertDontSee('<script>alert("xss")</script>', false);
});

test('guests are sent to login before writing a post', function () {
    $this->get(route('posts.create'))
        ->assertRedirect(route('login'));
});

test('an author can publish a post', function () {
    $author = User::factory()->create();

    $this->actingAs($author)
        ->post(route('posts.store'), [
            'title' => 'Hello studio',
            'body' => 'First entry',
        ])
        ->assertRedirect(route('posts.show', Post::query()->first()));

    $this->assertDatabaseHas('posts', [
        'title' => 'Hello studio',
        'user_id' => $author->id,
    ]);
});

test('publishing a post requires a title', function () {
    $author = User::factory()->create();

    $this->actingAs($author)
        ->from(route('posts.create'))
        ->post(route('posts.store'), [
            'title' => '',
            'body' => 'A body without a title',
        ])
        ->assertRedirect(route('posts.create'))
        ->assertSessionHasErrors([
            'title' => 'The title field is required.',
        ]);
});

test('an author can update and delete their post', function () {
    $author = User::factory()->create();
    $post = Post::factory()->for($author)->create();

    $this->actingAs($author)
        ->put(route('posts.update', $post), [
            'title' => 'Revised title',
            'body' => 'Revised body',
        ])
        ->assertRedirect(route('posts.show', $post));

    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => 'Revised title',
    ]);

    $this->actingAs($author)
        ->delete(route('posts.destroy', $post))
        ->assertRedirect(route('posts.index'));

    $this->assertModelMissing($post);
});

test('another author cannot edit or delete the post', function () {
    $post = Post::factory()->create();
    $intruder = User::factory()->create();

    $this->actingAs($intruder)
        ->get(route('posts.edit', $post))
        ->assertForbidden();

    $this->actingAs($intruder)
        ->put(route('posts.update', $post), [
            'title' => 'Taken over',
            'body' => 'Not allowed',
        ])
        ->assertForbidden();

    $this->actingAs($intruder)
        ->delete(route('posts.destroy', $post))
        ->assertForbidden();

    $this->assertModelExists($post);
});

test('the empty list tells the reader there are no posts', function () {
    $this->get(route('posts.index'))
        ->assertOk()
        ->assertSee('No posts yet.');
});
