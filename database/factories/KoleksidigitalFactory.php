<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KoleksidigitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'edisi' => $this->faker->sentence(mt_rand(2,8)),
            'isbn' => $this->faker->bothify('?????-#####'),
            'penerbit' => $this->faker->sentence(mt_rand(2,8)),
            'tahun_terbit' => $this->faker->year('+10 years'),
            'tempat_terbit' => $this->faker->city(),
            'bahasa' => $this->faker->sentence(mt_rand(2,8)),
            'excerpt' =>$this->faker->sentence(mt_rand(10,25)),
            // 'body' => $this->faker->paragraphs(mt_rand(1,2)),
            'body' => collect($this->faker->paragraphs(mt_rand(1,2)))
                        ->map(fn($p) => "<p>$p</p>")
                        ->implode(''),
            'author_id' => $this->faker->name('male'|'female'),
            'filekatalog'=> $this->faker->sentence(mt_rand(2,8)),
            'category_id' => mt_rand(1,2),
            'views' => $this->faker->randomNumber(1, true),
        ];
    }
}
