<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\user;
use App\roleSummary;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', 'admin')->first();
        $caixa = Role::where('name', 'caixa')->first();
        $Super = Role::where('name', 'SuperAdmin')->first();

        $userCreation = User::create([
            'name' => 'ernesto',
            'email' => 'ernesto@hotmail.com',
            'password' => bcrypt('ernesto')
        ]);

        // $userCreation2 = User::create([
        //     'name' => 'abrantes',
        //     'email' => 'abrantescua@gmail.com',
        //     'password' => bcrypt('abrantes')
        // ]);

        $userCreation3 = User::create([
            'name' => 'ac',
            'email' => 'ac@gmail.com',
            'password' => bcrypt('12345')
        ]);



        //Caixa
        $userCreation->roles()->attach($caixa);

        // //Admin
        // $userCreation2->roles()->attach($caixa);
        // $userCreation2->roles()->attach($admin);

        //superAdmin
        $userCreation3->roles()->attach($Super);
        $userCreation3->roles()->attach($caixa);
        $userCreation3->roles()->attach($admin);

        //Gravando o  tipo de papel para cada utilizador
        $userDescription = roleSummary::create([
            'user_id' => $userCreation->id,
            'description' => 'Caixa'
        ]);

        // $userDescription2 = roleSummary::create([
        //     'user_id' => $userCreation2->id,
        //     'description' => 'Admin'
        // ]);

        $userDescription3 = roleSummary::create([
            'user_id' => $userCreation3->id,
            'description' => 'SuperAdmin'
        ]);
    }
}
