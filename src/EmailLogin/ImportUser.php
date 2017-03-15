<?php

namespace Oneup\Contao\EmailLogin;

use Contao\Frontend;
use Contao\MemberModel;
use Contao\UserModel;

class ImportUser extends Frontend
{
    public function getUsernameByEmail($username, $password, $table)
    {
        $user = null;

        if (false === filter_var($username, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if ('tl_member' === $table) {
            $user = MemberModel::findOneByEmail($username);
        }

        if ('tl_user' === $table) {
            $user = UserModel::findOneByEmail($username);
        }

        if (null !== $user) {
            $this->Input->setPost('username', $user->username);

            return true;
        }

        return false;
    }
}
