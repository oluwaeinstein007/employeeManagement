<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = Employee::class;
    public function definition(): array
    {
        return [
            //
            'Emp_ID' => $this->faker->randomNumber(5),
            'Name_Prefix' => $this->faker->title(),
            'First_Name' => $this->faker->firstName(),
            'Middle_Initial' => $this->faker->randomLetter(),
            'Last_Name' => $this->faker->lastName(),
            'Gender' => $this->faker->randomElement(['M', 'F']),
            'E_Mail' => $this->faker->email(),
            'Date_of_Birth' => $this->faker->date(),
            'Time_of_Birth' => $this->faker->time(),
            'Age_in_Yrs' => $this->faker->randomFloat(2, 0, 100),
            'Date_of_Joining' => $this->faker->date(),
            'Age_in_Company_Years' => $this->faker->randomFloat(2, 0, 100),
            'Phone_No' => $this->faker->phoneNumber(),
            'Place_Name' => $this->faker->city(),
            'County' => $this->faker->country(),
            'City' => $this->faker->city(),
            'Zip' => $this->faker->postcode(),
            'Region' => $this->faker->state(),
            'User_Name' => $this->faker->userName(),
        ];
    }
}
