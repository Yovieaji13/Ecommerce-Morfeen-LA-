<?php

namespace Database\Seeders;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

// use Illuminate\Database\Seeder;

class OngkirSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/FileExcel/Ongkir.xlsx';
        $this->timestamps = new \DateTime;

        parent::run();
    }
}
