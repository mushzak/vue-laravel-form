<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\DbConfig;


class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DbConfig::truncate();
        DB::table('db_configs')->insert([
            [
                'host' => '127.0.0.1',
                'database' => 'vue-form',
                'table' => 'feedback',
                'user'=>'root',
                'password'=>null
            ]
        ]);
    }
}
