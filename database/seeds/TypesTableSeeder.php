<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Type;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::truncate();
        DB::table('types')->insert([
            [
                'name' => 'Local Database',
                'type' => 'local'
            ],
            [
                'name' => 'Database',
                'type' => 'db'
            ],
            [
                'name' => 'File',
                'type' => 'file'
            ],
            [
                'name' => 'Email',
                'type' => 'email'
            ]
        ]);
    }
}
