<?php

namespace Core;



class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {

                $this->login(
                    [
                        'email' => $email
                    ]
                );

                return true;
            }
        }
        return false;
    }
    function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        // update the current session id
        // true : delete the old one 
        session_regenerate_id(true);
    }
    function logout()
    {
        Session::destroy();
    }
}
