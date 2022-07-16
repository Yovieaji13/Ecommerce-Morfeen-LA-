<?php

namespace Database\Seeders;

// use Illuminate\Database\Seeder;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class AtributSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/FileExcel/Atribut.xlsx';
        $this->timestamps = new \DateTime;

        parent::run();
    }
}
