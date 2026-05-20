<?php

declare(strict_types=1);

return [
    // Comma-separated IPs excluded from visit tracking (e.g. your own).
    'ignored_ips' => env('ANALYTICS_IGNORED_IPS', ''),
];
