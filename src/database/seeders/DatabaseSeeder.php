<?php
//シーダファイルを登録
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthorsTableSeeder::class); //runメソッドにシ－ダーを実行
        // \App\Models\User::factory(10)->create();
    }
}
