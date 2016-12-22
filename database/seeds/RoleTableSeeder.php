<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name="admin";
        $admin->description="full access";
        $admin->save();

        $student = new Role();
        $student->name="student";
        $student->description="only free courses";
        $student->save();

        $user = new Role();
        $user->name="teacher";
        $user->description="manage his courses";
        $user->save();
    }
}
