<?php

namespace Database\Factories;

use App\Models\Romertall;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Romertall>
 */
class RomertallFactory extends Factory
{
   /**
    * The name of the factory's corresponding model
    * @var string
    */

    protected $model = Romertall::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $romanNumerals = [
            'I' => 1,
            'II' => 2,
            'III' => 3,
            'IV' => 4,
            'V' => 5,
            'VI' => 6,
            'VII' => 7,
            'VIII' => 8,
            'IX' => 9,
            'X' => 10,
            
        ];

        $randomRoman = $this->faker->randomElement(array_keys($romanNumerals));
        $correspondingInteger = $romanNumerals[$randomRoman];

        return [
            'romertall' => $randomRoman,
            'integertall' => $correspondingInteger,
            
        ];
    }
}
