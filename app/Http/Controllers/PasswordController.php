<?php

namespace App\Http\Controllers;

use App\Models\Password;
use App\Models\Client;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passwords  = Password::all();
        $clients = Client::all();
        return  view('passwords.index')->with('clients',$clients)->with('passwords',$passwords);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = new Password;

        $password->client_id = $request->company;
        $password->name = $request->name;
        $password->service = $request->service;
        $password->address = $request->address;
        $password->username = $request->username;
        $password->new_password = $request->new_password;
        $password->old_password = $request->old_password;
        $password->notes = $request->notes;

        $password->save();
        return redirect()->back()->with('message', 'Password saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function show(Password $password)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function edit(Password $password)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $password)
    {
        $password = Password::where('id', $password)->first();
        $password->client_id = $request->company;
        $password->name = $request->name;
        $password->service = $request->service;
        $password->address = $request->address;
        $password->username = $request->username;
        if ($password->new_password != $request->new_password) {
            $password->old_password = $password->new_password;
            $password->new_password = $request->new_password;
        }
        $password->notes = $request->notes;

        $password->save();
        return redirect()->back()->with('message', 'Password saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function destroy(Password $password)
    {
        $data = Password::where('id', $password)->first();
        $data->delete();
        return redirect()->back()->with('message', 'Password deleted successfully!');
    }

    public function archive($password)
    {
        $data = Password::where('id', $password)->first();
        $data->is_archived = true;
        $data->save();
        return redirect()->back()->with('message', 'Password archived successfully!');
    }

    public function unarchive($password)
    {
        $data = Password::where('id', $password)->first();
        $data->is_archived = false;
        $data->save();
        return redirect()->back()->with('message', 'Password unarchived successfully!');
    }

    public function getall()
    {
        $clients = Client::all();

        $ids = array();
        $admin_ids = array();

        foreach ($clients as $client) {
            foreach ($client->users as $user) {
                if (\Auth::user()->role == "Admin") {
                    array_push($admin_ids, $client->id);
                } elseif ($user->id == \Auth::user()->id) {
                    array_push($ids, $client->id);
                }
            }
        }

        $clients_users = Client::whereIn('id', $ids)->get();

        if (\Auth::user()->role == "Admin") {
            return $clients;
        } else {
            return $clients_users;
        }
    }

}
