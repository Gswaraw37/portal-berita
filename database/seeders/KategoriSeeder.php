<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Kategori::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['kategori' => 'Ekonomi'],
            ['kategori' => 'Teknologi'],
            ['kategori' => 'Hukum'],
            ['kategori' => 'Sosial'],
            ['kategori' => 'Kesehatan'],
        ];

        foreach ($data as $value){
            Kategori::insert([
                'kategori' => $value['kategori'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
