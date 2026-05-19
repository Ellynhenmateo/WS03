<?php

namespace Framework\middleware;

use Framework\Session;


/**Check if user is authenticated
 * 
 * @return bool
 */
class Authorize
{

    public function isAuthenticated()
    {
        return Session::has('user');
    }


    /**
     * Handle the user's request
     * 
     * @params string $role
     * @return bool
     */

    public function handle($role)
    {

        if (
            $role === 'guest' &&
            $this->isAuthenticated()
        ) {
            return redirect('/');
        } elseif (
            $role === 'auth' &&
            !$this->isAuthenticated()
        ) {
            return redirect('/auth/login');
        }
    }
}
