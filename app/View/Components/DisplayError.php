<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DisplayError extends Component
{
    public $title, $desc;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = 'Tidak Ada Hasil Ditemukan', $desc = 'Tidak ada data yang bisa ditampilkan di halaman ini, jika ada yang perlu ditanyakan sialahkan menuju halaman Kontak')
    {
        $this->title = $title;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.display-error');
    }
}
