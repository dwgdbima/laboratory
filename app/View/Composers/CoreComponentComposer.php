<?php

namespace App\View\Composers;

use App\Models\Component;
use Illuminate\Contracts\View\View;

class CoreComponentComposer
{
    public function compose(View $view)
    {
        $coreComponent = Component::all()->first();
        $view->with([
            'coreComponent' => $coreComponent,
        ]);
    }
}
