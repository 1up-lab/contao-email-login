<?php

namespace Oneup\Contao\EmailLogin;

use Contao\Frontend;
use Contao\MemberModel;

class ImportUser extends Frontend
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function getUsernameByEmail($username, $password, $table)
    {
        if ('tl_member' === $table) {
            if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                $member = MemberModel::findOneByEmail($username);

                if (null !== $member) {
                    $this->Input->setPost('username', $member->username);
                    return true;
                }
            }
        }

        return false;
    }
}
