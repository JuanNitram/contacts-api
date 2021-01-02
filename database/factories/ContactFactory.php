<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $avatars = [
            'https://cdn3.iconfinder.com/data/icons/avatars-round-flat/33/avat-01-512.png',
            'https://i.pinimg.com/originals/a6/58/32/a65832155622ac173337874f02b218fb.png',
            'https://www.pngarts.com/files/5/User-Avatar-Transparent.png'
        ];

        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'about' => $this->faker->text,
            'avatar' => $avatars[array_rand($avatars)]
        ];
    }
}
