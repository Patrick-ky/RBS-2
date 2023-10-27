<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StallNumberSeeder extends Seeder
{

    // Gamiton na Command para ma apply sa table :  php artisan db:seed --class=StallNumberSeeder
    public function run()
    {
        $stallTypeData = [
            2 => ['prefix' => 'RF', 'count' => 28],
            5 => ['prefix' => 'GT', 'count' => 132],
            3 => ['prefix' => 'FT', 'count' => 84],
            4 => ['prefix' => 'DG', 'count' => 25],
            1 => ['prefix' => 'SS', 'count' => 98],
            8 => ['prefix' => 'CP', 'count' => 48],
            9 => ['prefix' => 'CM', 'count' => 40],
            7 => ['prefix' => 'CD', 'count' => 48],
            10 => ['prefix' => 'NP', 'count' => 28],
            6 => ['prefix' => 'VG', 'count' => 134],
        ];

        foreach ($stallTypeData as $stallTypeId => $stallTypeDetails) {
            $prefix = $stallTypeDetails['prefix'];
            $count = $stallTypeDetails['count'];

            for ($i = 1; $i <= $count; $i++) {
                $stallNumber = str_pad($i, 3, '0', STR_PAD_LEFT) . $prefix;
                $description = $this->getStallTypeDescription($stallTypeId);

                DB::table('stall_numbers')->insert([
                    'stall_number' => $i,
                    'stall_type_id' => $stallTypeId,
                    'status' => 'available',
                    'nameforstallnumber' => $stallNumber,
                    'description' => $description,
                ]);
            }
        }
    }

    private function getStallTypeDescription($stallTypeId)
    {
        $descriptions = [
            2 => 'Second Row',
            5 => 'Second Row',
            3 => 'Fifth Row',
            4 => 'Sixth Row',
            1 => 'Fourth Row',
            8 => 'First Row',
            9 => 'Third Row',
            7 => 'Fifth Row',
            10 => 'Seventh Row',
            6 => 'First Row',
        ];

        return $descriptions[$stallTypeId] ?? '';
    }
}
