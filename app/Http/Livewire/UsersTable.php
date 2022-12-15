<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Client;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $per_page = 100;
    public $search = '';
    public $orderBy = 'name';
    public $orderAsc = true;
    public $incomplete = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $clients = Client::all();

        return view('livewire.users-table', [
            'users' => User::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->per_page),
        ])->with("clients",$clients);
    }
}
