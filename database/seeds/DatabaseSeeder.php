<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* -- Roles -- */
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Администратор',
            'slug' => 'admin_slug',
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Менеджер',
            'slug' => 'manager_slug',
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Техническая поддержка',
            'slug' => 'tech_support_slug',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /* -- Users -- */
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Александр Ким',
            'email' => 'alex@alex.kz',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Дмитрий Бродягин',
            'email' => 'moroz@dima.kz',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Никита Романов',
            'email' => 'nik@rom.kz',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /* -- Roles and Users -- */
         DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /* -- Statuses -- */
        DB::table('statuses')->insert([
            'id' => 1,
            'title' => 'Ждет выполнения'
        ]);
        DB::table('statuses')->insert([
            'id' => 2,
            'title' => 'Выполняется'
        ]);
        DB::table('statuses')->insert([
            'id' => 3,
            'title' => 'Выполнено'
        ]);
        DB::table('statuses')->insert([
            'id' => 4,
            'title' => 'Отложено'
        ]);
        DB::table('statuses')->insert([
            'id' => 5,
            'title' => 'Отменено'
        ]);

         /* -- Tasks -- */
        DB::table('tasks')->insert([
            'id' => 1,
            'title' => 'Косяки при авторизации и регистрации',
            'slug' => 'kosyaki_pri_auth_reg',
            'role' => 3,
            'deadline' => Carbon::parse('2019-07-15')
        ]);

        DB::table('tasks')->insert([
            'id' => 2,
            'title' => 'Сделать экспорт статистики',
            'slug' => 'sdelat_export_statictics',
            'role' => 2,
            'deadline' => Carbon::parse('2019-07-12')
        ]);

        DB::table('tasks')->insert([
            'id' => 3,
            'title' => 'Проверить на мультиаккаунты',
            'slug' => 'check_multi_akk',
            'role' => 1,
            'deadline' => Carbon::parse('2019-06-10')
        ]);

        DB::table('tasks')->insert([
            'id' => 4,
            'title' => 'Исправить работу уведомлении',
            'slug' => '',
            'role' => 3,
            'deadline' => Carbon::parse('2019-09-07')
        ]);

        /* -- Responsibles -- */
        DB::table('responsibles')->insert([
            'id' => 1,
            'tasks_id' => 1,
            'responsible_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('responsibles')->insert([
            'id' => 2,
            'tasks_id' => 1,
            'responsible_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('responsibles')->insert([
            'id' => 3,
            'tasks_id' => 2,
            'responsible_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('responsibles')->insert([
            'id' => 4,
            'tasks_id' => 3,
            'responsible_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('responsibles')->insert([
            'id' => 5,
            'tasks_id' => 4,
            'responsible_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

         /* -- producers -- */
        DB::table('producers')->insert([
            'id' => 1,
            'tasks_id' => 1,
            'producer_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('producers')->insert([
            'id' => 2,
            'tasks_id' => 1,
            'producer_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('producers')->insert([
            'id' => 3,
            'tasks_id' => 2,
            'producer_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('producers')->insert([
            'id' => 4,
            'tasks_id' => 3,
            'producer_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('producers')->insert([
            'id' => 5,
            'tasks_id' => 4,
            'producer_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /* -- task_statuses -- */
        DB::table('task_statuses')->insert([
            'id' => 1,
            'tasks_id' => 1,
            'status_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('task_statuses')->insert([
            'id' => 2,
            'tasks_id' => 1,
            'status_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('task_statuses')->insert([
            'id' => 3,
            'tasks_id' => 2,
            'status_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('task_statuses')->insert([
            'id' => 4,
            'tasks_id' => 3,
            'status_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('task_statuses')->insert([
            'id' => 5,
            'tasks_id' => 4,
            'status_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
