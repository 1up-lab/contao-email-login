<?php

$GLOBALS['TL_HOOKS']['importUser'][] = array('Oneup\Contao\EmailLogin\ImportUser', 'getUsernameByEmail');
