<?php

namespace App\Database\Seeds;

use App\Models\reviewModel;
use App\Models\prisonerModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Prisoner extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 5; $i++) {

            $data[] = $this->generateProgressPrisoner();
        }

        $student_obj = new reviewModel();

        $student_obj->insertBatch($data);
    }

    public function generateProgressPrisoner()
    {
        $faker = Factory::create();

        return [
            "prisoner" => $faker->prisoner(),
            "participation" => $faker->numberBetween(1, 10),
            "behaviour" => $faker->numberBetween(1, 10),
            "team_work" => $faker->numberBetween(1, 10),
            "social_interactions" => $faker->numberBetween(1, 10),
            "remarks" => $faker->randomElement([
                "Good Work",
                "Improving",
                "Progresss"
            ]),
        ];
    }
}