<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Lottery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Therapists>
 */
class TherapistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $first = fake()->firstName();
        $last = fake()->lastName();
        $user = User::factory()->create([
            'name' => $first.' '.$last,
            'email' => $first.'.'.$last.'@mail.com',
            'role' => 'psychotherapist',
        ]);

        $gender = config('form-options.gender');
        array_shift($gender);

        $race = $this->jsonRandomArray(config('form-options.race'), 3, 2);

        $sexual_orientation = config('form-options.sexual_orientation');
        array_shift($sexual_orientation);

        $religion = config('form-options.religion');
        array_shift($religion);

        $language = $this->jsonRandomArray(config('form-options.language'), 3, 5);

        $modality = $this->jsonRandomArray(config('form-options.modality'), 2, 4);

        $orientation = $this->jsonRandomArray(config('form-options.orientation'), 2, 4);

        return [
            'user_id' => $user->id,
            'bio' => fake()->randomElement(config('bio')),
            'dob' => fake()->dateTimeBetween(now()->subYears(70), now()->subYears(25)),
            'gender' => fake()->randomElement($gender),
            'race' => json_encode($race),
            'sexual_orientation' => fake()->randomElement($sexual_orientation),
            'religion' => fake()->randomElement($religion),
            'language' => json_encode($language),
            'modality' => json_encode($modality),
            'orientation' => json_encode($orientation),
            'photo' => '/storage/photo/'.$user->id.'.png',
        ];
    }

    private function jsonRandomArray(array $arr, int $loserOdds, int $loserValue): array
    {
        array_shift($arr);

        $numEl = Lottery::odds(1, $loserOdds)
            ->winner(fn () => 1)
            ->loser(fn () => $loserValue)
            ->choose();

        $retArr = [];
        for ($i = 0; $i < $numEl; $i++) {
            $retArr[] = fake()->randomElement($arr);
        }

        return array_values(array_unique($retArr));
    }
}
