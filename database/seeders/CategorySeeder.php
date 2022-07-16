<?php

namespace Database\Seeders;

// use Illuminate\Database\Seeder;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class CategorySeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/FileExcel/Category.xlsx';

        // Cara mapping beberapa sheat di 1 File Excel
        // $this->worksheetTableMapping = [
        //     'barang' => 'barang',
        //     'category' => 'category',
        //     'gambar' => 'gambar',
        //     'users' => 'users'
        //     ];
        $this->timestamps = new \DateTime;

        parent::run();
    }
}
