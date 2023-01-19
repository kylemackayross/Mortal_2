<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\QuickLink;
use Livewire\WithPagination;

class QuickLinksTable extends Component
{
    use WithPagination;

    public $per_page = 100;
    public $search = "";
    public $orderBy = 'name';
    public $orderAsc = true;

    public function render()
    {
        return view('livewire.quick-links-table', [
            'quicklinks' => QuickLink::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->per_page),
        ]);
    }
}
