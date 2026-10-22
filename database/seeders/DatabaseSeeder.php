<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $author = User::factory()->create([
            'name' => 'Alex Rivera',
            'email' => 'alex@studio.test',
        ]);

        $author->posts()->create([
            'title' => 'Views that ship',
            'body' => "Week 8 returned controllers. This week those actions return Blade.\n\nA writer who types <strong>html</strong> still sees the tags as text, because the post body is escaped.",
        ]);

        $author->posts()->create([
            'title' => 'One layout, many posts',
            'body' => "The header and footer live in the shared layout. Each post only fills the content section.\n\nThe card on the home page is a Blade component, so every post uses the same markup.",
        ]);

        $author->posts()->create([
            'title' => 'Signed-in authors',
            'body' => "Guests can read every post. The new-post link appears after you sign in, and only the author sees edit and delete.\n\nTry the classroom account on the sign-in page.",
        ]);
    }
}
