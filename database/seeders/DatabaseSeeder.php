<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Employee::factory(15)->create();

        $madeUp = Company::factory()->create([
            'name' => 'This Company has many employees'
        ]);
        Employee::factory(15)->create([
            'company_id' => $madeUp->id,
            'company' => $madeUp->name
        ]);
    }
}
