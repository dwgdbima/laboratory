<?php

namespace App\View\Composers;

use App\Models\About;
use App\Models\Contact;
use Illuminate\Contracts\View\View;

class ContactComposer
{
    public function compose(View $view)
    {
        $contact = Contact::all()->first();
        $about = About::all()->first();
        $view->with([
            'contact' => $contact,
            'about' => $about,
        ]);
    }
}
