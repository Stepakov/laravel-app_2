<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence( 3, true );
        $slug = Str::substr( Str::lower( preg_replace( '/\s+/', '-', $title ) ), 0, -1 );

        return [
            'title' => $title,
            'slug' => $slug,
            'body' => $this->faker->paragraphs( 100, true ),
            'img' => 'https://via.placeholder.com/600/333/fff/?text=' . $title,
            'created_at' => $this->faker->dateTimeBetween( '-1 years' ),
        ];
    }
}
