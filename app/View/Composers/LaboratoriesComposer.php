<?php

namespace App\View\Composers;

use App\Models\Laboratory;
use Illuminate\Contracts\View\View;

class LaboratoriesComposer
{
    public function compose(View $view)
    {
        $laboratories = Laboratory::all();
        $i = ceil($laboratories->count() / 3);
        $chunk = $laboratories->chunk($i);

        $view->with([
            'laboratories' => $chunk
        ]);
    }
}
