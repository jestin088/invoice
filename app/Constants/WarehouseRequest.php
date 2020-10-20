<?php

namespace App\Constants;

class WarehouseRequest
{
    const PENDING = 'PENDING';
    const REJECTED = 'REJECTED';
    const APPROVED = 'APPROVED';

    const LABELS = [
        self::PENDING => 'Pending',
        self::REJECTED => 'Rejected',
        self::APPROVED => 'Approved'
    ];
}
