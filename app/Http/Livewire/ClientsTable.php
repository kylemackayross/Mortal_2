<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\User;
use Livewire\WithPagination;

class ClientsTable extends Component
{
    use WithPagination;

    public $per_page = 100;
    public $search = '';
    public $orderBy = 'company';
    public $orderAsc = true;
    public $incomplete = false;

    public function paginationView()
    {
        return 'livewire.custom-pagination';
    }

    public function render()
    {
        $users = User::all();

        return view('livewire.clients-table', [
            'clients' => Client::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->per_page),
        ])->with("users",$users);
    }
}
