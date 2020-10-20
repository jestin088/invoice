<?php

namespace App\Constants;

class Role
{
    const ADMIN = 'ADMIN';
    const OWNER = 'OWNER';
    const CUSTOMER = 'CUSTOMER';

    const LABELS = [
        self::ADMIN => 'Admin',
        self::CUSTOMER => 'Customer',
        self::OWNER => 'Owner'
    ];
}
