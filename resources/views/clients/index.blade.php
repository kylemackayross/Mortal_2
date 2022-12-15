@extends('dashboard')

@section('title', 'Clients')

@section('content')

    <div class="flex justify-between  select-none">
        <div>
            <a href="/" class="underline underline-offset-4 text-center text-lg font-semibold text-mo_red hover:text-mo_dar dark:hover:text-white">Back</a>
        </div>
        <div class="text-center">
            <h3 class="text-lg font-semibold text-mo_ora">Dashboard</h3>
            <h1 class="text-4xl font-semibold">Manage clients</h1>
            <div class="text-lg py-3">&nbsp;</div>
        </div>
        <div>
            <a href="/client/create"><button id="add_new" class="text-5xl h-16 w-16 bg-mo_ora text-white hover:text-mo_dar dark:hover:text-white hover:bg-transparent hover:border-2 border-mo_ora transition duration-200" data-before="+"></button></a>
        </div>
    </div>
    <div>
        <div>

            {{-- <div class="modal-body text-left">
                <form action="/user/create" method="post">
                    @csrf
                    <label for="">Name:</label>
                    <input type="text" name="name" class="form-control mb-4 text-mo_dar">

                    <label for="">Role:</label>
                    <input type="text" name="role" class="form-control mb-4 text-mo_dar">

                    <label for="">Email address:</label>
                    <input type="email" name="email" class="form-control mb-4 text-mo_dar">

                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control mb-4 text-mo_dar">

                    <input type="hidden" name="id" class="form-control mb-4 text-mo_dar" value="{{ Auth::user()->id }}">

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-20">Save</button>
                    </div>
                </form>
            </div> --}}

        </div>
        <div>

            <livewire:clients-table>

                {{-- @if (count($users) == 0)
                    <h2 class="text-xl">No data to display</h2>
                @else
                    <table class="table-auto w-full mb-6">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs tracking-wider text-left uppercase">ID</th>
                                <th class="px-6 py-3 text-xs tracking-wider text-left uppercase">Name</th>
                                <th class="px-6 py-3 text-xs tracking-wider text-left uppercase">Role</th>
                                <th class="px-6 py-3 text-xs tracking-wider text-left uppercase">Email
                                </th>
                                <th class="px-6 py-3 text-xs tracking-wider text-left uppercase">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->id }}</td>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->role }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="border px-4 py-2">
                                        <form action="/user/delete/{{ $user->id }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif --}}

        </div>
        <div class="mt-4">
            <form action="/attach" method="post" class="justify-center flex gap-4">
                @csrf
                <select class="h-full w-1/3 text-mo_dar px-4 py-2" name="user" required>
                    <option value="">User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <select class="h-full w-1/3 text-mo_dar px-4 py-2" name="client" required>
                    <option value="">Client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->company }}</option>
                    @endforeach
                </select>

                <button class="h-full w-1/4 text-mo_red font-semibold ring-2 ring-mo_red py-2 px-10 hover:text-white hover:bg-mo_red transition duration-200" type="submit">
                    ATTACH
                </button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // $("#add_new").on("click", function() {
            //     if ($(".new-item-row").hasClass("closed")) {
            //         console.log("science");
            //         $(".new-item-row").removeClass("closed");
            //         $(".new-item-row").show(200);
            //         $("#add_new").attr('data-before', '-', 200);
            //     } else {
            //         $(".new-item-row").addClass("closed");
            //         $(".new-item-row").hide(200);
            //         $("#add_new").attr('data-before', '+', 200);
            //     }
            // })

            $(".edit-row").on("click", function () {
                let target = $(this).attr("data-row");
                
                if ($(target).hasClass("closed")) {
                    $(target).show(200);
                    $(target).removeClass("closed");
                } else {
                    $(target).hide(200);
                    $(target).addClass("closed");
                }
            })
        });
    </script>
@endsection
