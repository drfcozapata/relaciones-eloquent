<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Image;
use App\Models\Level;
use App\Models\Location;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

  public function run(): void {

    Group::factory()->count(3)->create();

    Level::factory()->create(['name' => 'Oro']);
    Level::factory()->create(['name' => 'Plata']);
    Level::factory()->create(['name' => 'Bronce']);

    User::factory()->count(5)
      ->has(Profile::factory()->count(1)->has(Location::factory()->count(1)))
      ->has(Group::factory()->count(1))
      ->has(Image::factory(['url' => 'https://i.pravatar.cc/90'])->count(1))
      ->create();

    Category::factory()->count(4)->create();
    Tag::factory()->count(12)->create();

    Post::factory()->count(40)
      ->has(Image::factory()->count(1))
      // ->has(Comment::factory()->count(rand(1, 6)))
      ->create();

    $posts = Post::all();
    foreach ($posts as $post) {
      $num_tags = rand(1, 6);
      $tags = Tag::inRandomOrder()->take($num_tags)->get();
      $post->tags()->attach($tags);
    }

    $posts = Post::all();
    foreach ($posts as $post) {
      $num_comments = rand(1, 6);
      $comments = Comment::factory()->count($num_comments);
      $post->comments()->saveMany($comments);
    }

    Video::factory()->count(40)
      ->has(Image::factory()->count(1))
      ->has(Comment::factory()->count(rand(1, 6)))
      ->create();

    $videos = Video::all();
    foreach ($videos as $video) {
      $num_tags = rand(1, 6);
      $tags = Tag::inRandomOrder()->take($num_tags)->get();
      $video->tags()->attach($tags);
    }

    // $videos = Video::all();
    // foreach ($videos as $video) {
    //   $num_comments = rand(1, 6);
    //   $comments = Comment::factory()->count($num_comments);
    //   $video->comments()->attach($comments);
    // }
  }
}
