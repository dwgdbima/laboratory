<?php

namespace App\Observers;

use App\Models\Service;

class ServiceObserver
{
    public function creating(Service $service)
    {
        $service->slug = $service->name;
    }

    public function updating(Service $service)
    {
        $service->slug = $service->name;
    }
}
