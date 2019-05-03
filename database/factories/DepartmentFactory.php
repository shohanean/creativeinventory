<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Department;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'department_name' => $faker->company,
        'created_at' => Carbon::now()
    ];
});
