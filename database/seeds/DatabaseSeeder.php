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
        // $this->call(UsersTableSeeder::class);

//        $roles = ['superadmin', 'admin', 'user'];
//        for ($i=0; $i<count($roles); $i++)
//        {
//            \App\Role::create([
//              'name' => $roles[$i]
//            ]);
//        }
//
//        factory(\App\User::class, 10)->create();
//        factory(\App\Category::class, 5)->create();
//        factory(\App\Product::class, 20)->create();

//            $prod_id = \App\Product::pluck('id');
//            $prod_count = count($prod_id);
//
//            foreach ($users = \App\User::all() as $user)
//            {
//                for ($i=0; $i<rand(0, $prod_count); $i++)
//                {
//                    $id = $prod_id[$i];
//                    $user->favorites()->attach($id);
//                }
//            }
            factory(\App\Review::class, 20)->create();
    }
}
