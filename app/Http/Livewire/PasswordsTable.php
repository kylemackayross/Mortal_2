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
    public $company = "";

    public function render()
    {       

        $user_id = \Auth::user()->id;
        $clients = Client::all();
        
        $ids = array();
        $admin_ids = array();

        foreach ($clients as $client) {
            foreach ($client->users as $user) {
                if (\Auth::user()->role == "Admin") {
                    array_push($admin_ids, $client->id);
                } elseif ($user->id == $user_id) {
                    array_push($ids, $client->id);
                }
            }
        }

        if ($this->company != "") {
            return view('livewire.passwords-table', [
                'passwords' => Password::search($this->search)->where('client_id', $this->company)->whereIn('client_id', \Auth::user()->role == "Admin" ? $admin_ids : $ids)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->per_page),
            ])->with('clients',\Auth::user()->role == "Admin" ? $clients : $ids);
        } else {
            return view('livewire.passwords-table', [
                'passwords' => Password::search($this->search)->whereIn('client_id', \Auth::user()->role == "Admin" ? $admin_ids : $ids)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->per_page),
            ])->with('clients',\Auth::user()->role == "Admin" ? $clients : $ids);
        }
        
    }
}
