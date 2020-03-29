<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Hà Mạnh Tuấn",
            'gender' => "Name",
            'address' => "Ninh Bình",
            'email' => "tuanhanb98@gmail.com",
            'password' => bcrypt('123456789'),
            'avatar' => 'girl-1.png',
            'born' => "10-02-1998",
            'admin' => '1',
            'type' => 'Admin',
            'category_access' => '1',
            'product_access' => '1',
            'order_access' => '1',
            'store_access' => '1',
            'config_access' => '1',
            'customer_access' => '1',
            'user_access' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        factory(App\User::class, 10)->create();
    }
}
