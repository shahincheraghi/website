<?php

namespace App\Install;


class AdminAccount
{
    public function setup($data)
    {
        $admin = \App\User::create([
            'name' => $data['first_name'],
            'family' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
