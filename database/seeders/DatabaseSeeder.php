<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\GenConfig;
use App\Models\Permission;
use App\Models\Rank;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Role::truncate();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();

        Role::factory(1)->create();
        Role::factory(1)->create(['name'=>"admin"]);

        $routes=Route::getRoutes();
        $permissions_id=[];

        // insertion de toutes les url d'admin dans la table permission
        foreach ($routes as $route){
            if (strpos($route->getName(),'admin')!==false)
            {
                $permission=Permission::create(['name'=>$route->getName()]);
                $permissions_id[]=$permission->id;
                //var_dump($route->getName());
            }

        }

        Role::where('name','admin')->first()->permissions()->sync($permissions_id);

        $admin=User::factory()->create([
            'name'=>'Chot',
            'sname'=>'Apend',
            'lname'=>'Rodrigue',
            'gender'=>'m',
            'phone'=>'243992522582',
            'description'=>"Rochap est ma dénomination, je suis un passionné de la technologie et de l'informatique,
            dans tout c'est concevoir,analyser et développer les solutions informatiques qui fait mon vrai dévouement.",
            'email'=>'rodriguechot@gmail.com',
            'role_id'=>2,
        ]);

        $users=User::factory(1)->create();

        // generation de données configurables
        GenConfig::factory(1)->create();
        //generation de données Rank
        Rank::factory(1)->create();
    }
}
