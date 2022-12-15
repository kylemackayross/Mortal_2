@extends('dashboard')

@section('title', 'Passwords')

@section('content')

    <div class="flex justify-between">
        <div>
            <a href="/" class="underline underline-offset-4 text-center text-lg font-semibold text-mo_red hover:text-mo_dar dark:hover:text-white">Back</a>
        </div>
        <div class="text-center">
            <h3 class="text-lg font-semibold text-mo_ora">Dashboard</h3>
            <h1 class="text-4xl font-semibold">Manage passwords</h1>
            <div class="text-lg py-3">&nbsp;</div>
        </div>
        <div>
            <button id="add_new" class="text-5xl h-16 w-16 bg-mo_ora text-white" data-before="+"></button>
        </div>
    </div>
    <div>
        <div>

            <livewire:passwords-table>

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
    </div>

    <script>
        $(document).ready(function() {
            console.log("ready")

            $("#add_new").on("click", function() {
                if ($(".new-item-row").hasClass("closed")) {
                    console.log("science");
                    $(".new-item-row").removeClass("closed");
                    $(".new-item-row").show(200);
                    $("#add_new").attr('data-before', '-', 200);
                } else {
                    $(".new-item-row").addClass("closed");
                    $(".new-item-row").hide(200);
                    $("#add_new").attr('data-before', '+', 200);
                }
            })


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
