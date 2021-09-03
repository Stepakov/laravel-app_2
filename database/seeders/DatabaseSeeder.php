<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\State;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $tags = Tag::factory( 10 )->create();

        $articles = Article::factory( 20 )->create();

        $tag_ids = $tags->pluck( 'id' );

        $articles->each( function( $article ) use ( $tag_ids ) {
            State::factory( 1 )->create([
                'article_id' => $article->id
            ]);
            Comment::factory( 3 )->create([
                'article_id' => $article->id
            ]);

            $article->tags()->attach( $tag_ids->random( 3 ) );
        });
    }
}
