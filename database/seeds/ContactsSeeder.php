<?php

use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        dd(factory(App\Contact::class, rand(20, 50))->create(['user_id'=>1]));
        $users = [
            [
                'email' => 'john@doe.com',
                'name' => 'John Doe',
                'password' => 'secret'
            ],
            [
                'email' => 'jane@doe.com',
                'name' => 'Jane Doe',
                'password' => 'secret'
            ],
            [
                'email' => 'jack@doe.com',
                'name' => 'Jack Doe',
                'password' => 'secret'
            ]
        ];
        foreach ($users as $user) {
            $user = factory(App\User::class)->make($user);
            factory(App\Contact::class, rand(20, 50))->create(['user_id'=>$user->id]);
        }

    }
}
