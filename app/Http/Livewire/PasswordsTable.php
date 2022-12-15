<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Password;
use App\Models\Client;
use Livewire\WithPagination;

class PasswordsTable extends Component
{
    use WithPagination;

    public $per_page = 100;
    public $search = "";
    public $orderBy = 'name';
    public $orderAsc = true;
    public $incomplete = false;

    public function render()
    {       

        $user_id = \Auth::user()->id;
        $clients = Client::all();
        $ids = array();

        foreach ($clients as $client) {
            foreach ($client->users as $user) {
                if ($user->id == $user_id) {
                    array_push($ids, $client->id);
                }
            }
        }

        return view('livewire.passwords-table', [
            'passwords' => Password::search($this->search)->whereIn('client_id', $ids)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->per_page),
        ])->with('clients',$clients);
    }
}
