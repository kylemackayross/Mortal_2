<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $clients = Client::all();
        return  view('users.index')->with('users',$users)->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $clients = Client::all();
        return  view('users.create')->with('users',$users)->with('clients',$clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'role' => ['required', 'string', 'max:255'],
        // ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make("moagency#123");
        $user->role = $request->role;

        $user->save();

        if ($request->clients){
            foreach ($request->clients as $client) {
                $user->clients()->attach($client);
            }
        }
        return redirect()->back()->with('message', 'User saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = \Hash::make("moagency123#");
        $user->role = $request->role;

        $user->save();
        return redirect()->back()->with('message', 'User saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::where('id', $id)->first();
        $data->delete();
        return redirect()->back()->with('message', 'User deleted successfully!');
    }

    // Custom Functions

    public function attach_client(Request $request)
    {
        // $user = User::find($user_id);
        // $client = Client::find($client_id);

        if ($request) {
            $user = User::find($request->user);
            $client = Client::find($request->client);
        } else {
            // $user = User::find($user_id);
            // $client = Client::find($client_id);
        }

        $user->clients()->attach($client);
        return redirect()->back()->with('message', 'User attached successfully!');
    }

    public function detach_client($user_id, $client_id)
    {
        $user = User::find($user_id);
        $client = Client::find($client_id);

        $user->clients()->detach($client);
        return redirect()->back()->with('message', 'User detached successfully!');
    }
}
