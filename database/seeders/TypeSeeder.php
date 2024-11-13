<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('types')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('types')->insert([
            [
                'code' => 'message',
                'name' => 'Tin nhắn',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'song',
                'name' => 'Bài hát',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
