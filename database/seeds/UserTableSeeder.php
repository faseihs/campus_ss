<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \Illuminate\Support\Facades\DB::table("users")->insert([
           "name"=>"Admin 1",
           "password"=>bcrypt("12345678"),
           "email"=>"admin1@css.com",
           "role_id"=>1,
           "email_verified_at"=>\Carbon\Carbon::now()->toDateTimeString() ,
           "created_at"=>\Carbon\Carbon::now()->toDateTimeString() ,
            "updated_at"=>\Carbon\Carbon::now()->toDateTimeString()
        ]);

        \Illuminate\Support\Facades\DB::table("users")->insert([
            "name"=>"Admin 2",
            "password"=>bcrypt("12345678"),
            "email"=>"admin2@css.com",
            "role_id"=>2,
            "email_verified_at"=>\Carbon\Carbon::now()->toDateTimeString() ,
            "created_at"=>\Carbon\Carbon::now()->toDateTimeString() ,
            "updated_at"=>\Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
