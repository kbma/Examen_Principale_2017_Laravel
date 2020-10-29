<?php

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
        //$this->call(UsersTableSeeder::class);
       Factory('App\User',20)->create();
    Factory('App\Company',10)->create();
      Factory('App\JobOffer',100)->create();
       Factory('App\JobOfferUser',400)->create();
    }
}
