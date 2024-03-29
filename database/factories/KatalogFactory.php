<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KatalogFactory extends Factory
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
            'jumlah' => $this->faker->randomNumber(3, true),
            'bahasa' => $this->faker->sentence(mt_rand(2,8)),
            'lokasi_id' => mt_rand(1,2),
            'excerpt' =>$this->faker->sentence(5),
            // 'body' => $this->faker->paragraphs(mt_rand(1,2)),
            'body' => collect($this->faker->paragraphs(mt_rand(1,2)))
                        ->map(fn($p) => "<p>$p</p>")
                        ->implode(''),
            'author_id' => $this->faker->name('male'|'female'),
            'label_id' => mt_rand(1,2),
            'category_id' => mt_rand(1,2),
            'pinjam' => $this->faker->randomNumber(1, true),
        ];
    }
}
