<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Add a record with Eloquent ORM
         $user = new User;
         $user->document = 75000001;
         $user->birth = '2011_02_19';
         $user->gender = 'male';
         $user->fullname = "Jeremias Springfield";
         $user->photo = "";
         $user->phone = 310000001;
         $user->email = "jeremias@gmail.com";
         $user->password = bcrypt('admin');
         $user->role = "admin";
         $user->save();
 
         // Add a record with Array 
         DB::table('users')->insert([
             'document' => 75000002,
             'birth' => '2010_02_19',
             'gender' => 'female',
             'fullname' => 'John Wick',
             'photo' => 'another-john-wick.jpg',
             'phone' => 310000002,
             'email' => 'johnw@gmail.com',
             'password' => bcrypt('12345')
 
         ]);
    }
}
