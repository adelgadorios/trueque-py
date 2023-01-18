<?php

use Illuminate\Database\Seeder;
class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\User::create(['name'=>'delivery','cedula'=>'0000000','phone'=>'0984411421', 'email' => 'delivery@vimana.com', 'password' => bcrypt('vimanatrueque')]);
    }
}
