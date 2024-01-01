<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\House;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = database_path('seeders/files/property-data.csv');
        $file = fopen($csvFile, 'r');
        $csvHeader = fgetcsv($file);
        $csvHeader = array_map('strtolower', $csvHeader);
        $fieldsCount = count($csvHeader);
        while ($csvRow = fgetcsv($file)) {
            if (count($csvRow) == $fieldsCount) {
                $data = array_combine($csvHeader, $csvRow);
                House::factory()
                    ->count(1)
                    ->sequence($data)
                    ->create();
            }
        }
        fclose($file);
    }
}
