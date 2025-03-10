<?php

use Illuminate\Database\Seeder;
use App\Setting;
use App\User;
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

           'blog_name'=>'mahmoudhatem',
           'phone_number'=>'01119565274',
           'blog_email'=>'mahmoudhatem465@yahoo.com',
           'address'=>'el marg 15 street '

        ]);

             User::create([
            'name' => 'mahmoud',
            'email' => 'mahmoudhatem465@gmail.com',
            'password' => Hash::make('M0185954515'),
        ]);
    }
}
