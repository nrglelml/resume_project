<?php

namespace Database\Seeders;

use App\Models\Integration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntegrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Integration::create([
           'name' => 'Google Recaptcha',
            'status'=> 1,
            'config'=> json_encode([
                'version'=>'v2',
                'site_key'=>'6Le0YjkoAAAAAKcgpU4trbun--6yEBDchbY73DIj',
                'secret_key'=>'6Le0YjkoAAAAAFTWdWAg89Ovv1QjmKmTIBkOrJ-P',
                'min_score'=>'0.3'
            ])
        ]);
    }
}
