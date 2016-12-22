<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role=Role::where('name','admin')->first();
        $teacher_role=Role::where('name','teacher')->first();
        $student_role=Role::where('name','student')->first();

        $admin = new User();
        $admin->name="admin";
        $admin->email="admin@admin.com";
        $admin->password=bcrypt("admin");
        $admin->picture="admin.png";
        $admin->roles()->associate($admin_role);
        $admin->save();

        $student = new User();
        $student->name="student";
        $student->email="student@student.com";
        $student->password=bcrypt("student");
        $student->picture="student.png";
        $student->roles()->associate($student_role);
        $student->save();

        $teacher = new User();
        $teacher->name="teacher";
        $teacher->email="teacher@teacher.com";
        $teacher->password=bcrypt("teacher");
        $teacher->picture="teacher.png";
        $teacher->roles()->associate($teacher_role);
        $teacher->save();
    }
}
