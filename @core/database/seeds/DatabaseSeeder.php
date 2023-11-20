<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        update_static_option('site_script_version','1.0.8');
        // $this->call(UsersTableSeeder::class);

//          $permissions = [
////        'general-settings-rss-feed'
//
//
//          ];
//        foreach ($permissions as $permission){
//            \Spatie\Permission\Models\Permission::updateOrCreate(['name' => $permission,'guard_name' => 'admin']);
//        }

//        $pass = '12345678';
//        \App\Admin::create([
//            'name' => 'Sohan',
//            'username' => 'super_admin',
//            'email' => 'tt@dd.com',
//            'password' => Hash::make($pass),
//        ]);
    }
}
