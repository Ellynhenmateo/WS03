<?php


namespace Framework;

use Framework\Session;
class Authorization
{
    /**
     * Check if logged in user owns a listing.
     * 
     * @param int $resourceId
     * @return bool
     */
    public static function isOwner($resourceId)
    {
        $sessionUser = Session::get('user');

        if (!$sessionUser || !isset($sessionUser['id'])) {
            return false;
        }

        return (int) $sessionUser['id'] === (int) $resourceId;
    }

}
