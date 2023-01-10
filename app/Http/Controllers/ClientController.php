<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        $users = User::all();
        return  view('clients.index')->with('clients',$clients)->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('clients.create')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request;
        // return $request;
        $client = new Client;
        
        // $client->name = $request->name;
        $client->email = $request->email;
        $client->type = $request->type;
        $client->company = $request->company;
        $client->gdl = $request->gdl;
        // $client->csm = $request->csm;
        // $client->is = $request->is;
        // $client->tech = $request->tech;
        // $client->designer = $request->designer;
        // $client->invoice = $request->invoice;
        // $client->agreement = $request->agreement;
        // $client->message = $request->message;

        $client->save();

        foreach ($request->users as $user) {
            $client->users()->attach($user);
        }

        if ($request->slack) {
            $response = \Http::post('https://6619bac4-2117-4672-ad64-cc328ab63e5f.integration-hook.com', [
                'client' => $client, 
                'csm' => $request->csm,
                'is' => $request->is,
                'designer' => $request->designer,
                'tech' => $request->tech,
                'invoice' => $request->invoice,
                'agreement' => $request->agreement,
                'message' => $request->message,
                'users' => $client->users, 
            ]);
        }

        $users = User::all();
        $clients = Client::all();
        return redirect('/clients')->with('message', 'Client saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $client->email = $request->email;
        $client->type = $request->type;
        $client->company = $request->company;
        $client->gdl = $request->gdl;

        $client->save();

        return redirect()->back()->with('message', 'Client saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($client)
    {
        $data = Client::where('id', $client)->first();
        $data->delete();
        return redirect()->back()->with('message', 'Client deleted successfully!');
    }
}
