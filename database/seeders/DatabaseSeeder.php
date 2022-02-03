<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();


        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'Personal',
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'Family',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'Work',
        ]);


        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'Title' => 'First Post',
            'Slug' => 'first-post',
            'Excerpt' => '<p>This is the third post</p>',
            'Body' => '<p>Proin molestie odio felis, id vulputate tortor tristique vel. Sed in metus eget enim blandit efficitur. Nam auctor lorem ut mollis vestibulum. Nunc interdum venenatis mollis. Proin at urna eleifend, varius lacus eu, pulvinar quam. Donec eget molestie libero. Aliquam tincidunt lorem ultricies, aliquet dolor quis, pharetra metus. Aliquam varius convallis nulla, nec molestie eros mattis sit amet. Phasellus metus nisl, imperdiet et vehicula in, vehicula id elit. Vestibulum maximus mauris quis lorem vehicula, non tristique magna varius. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis in pellentesque urna. Fusce at ex augue. Etiam maximus sollicitudin mattis. Cras sodales lacinia mi, bibendum fringilla leo euismod vitae.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'Title' => 'second Post',
            'Slug' => 'second-post',
            'Excerpt' => '<p>This is the third post</p>',
            'Body' => '<p>Proin molestie odio felis, id vulputate tortor tristique vel. Sed in metus eget enim blandit efficitur. Nam auctor lorem ut mollis vestibulum. Nunc interdum venenatis mollis. Proin at urna eleifend, varius lacus eu, pulvinar quam. Donec eget molestie libero. Aliquam tincidunt lorem ultricies, aliquet dolor quis, pharetra metus. Aliquam varius convallis nulla, nec molestie eros mattis sit amet. Phasellus metus nisl, imperdiet et vehicula in, vehicula id elit. Vestibulum maximus mauris quis lorem vehicula, non tristique magna varius. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis in pellentesque urna. Fusce at ex augue. Etiam maximus sollicitudin mattis. Cras sodales lacinia mi, bibendum fringilla leo euismod vitae.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'Title' => 'third Post',
            'Slug' => 'third-post',
            'Excerpt' => '<p>This is the third post</p>',
            'Body' => '<p>Proin molestie odio felis, id vulputate tortor tristique vel. Sed in metus eget enim blandit efficitur. Nam auctor lorem ut mollis vestibulum. Nunc interdum venenatis mollis. Proin at urna eleifend, varius lacus eu, pulvinar quam. Donec eget molestie libero. Aliquam tincidunt lorem ultricies, aliquet dolor quis, pharetra metus. Aliquam varius convallis nulla, nec molestie eros mattis sit amet. Phasellus metus nisl, imperdiet et vehicula in, vehicula id elit. Vestibulum maximus mauris quis lorem vehicula, non tristique magna varius. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis in pellentesque urna. Fusce at ex augue. Etiam maximus sollicitudin mattis. Cras sodales lacinia mi, bibendum fringilla leo euismod vitae.</p>'
        ]);
    }
}
