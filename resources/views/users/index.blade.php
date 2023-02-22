@extends('dashboard')

@section('title', 'Users')

@section('content')

    <div class="flex justify-between">
        <div>
            <a href="/" class="underline underline-offset-4 text-center text-lg font-semibold text-mo_red hover:text-mo_dar">Back</a>
        </div>
        <div class="text-center">
            <h3 class="text-lg font-semibold text-mo_ora">Dashboard</h3>
            <h1 class="text-4xl font-semibold">Manage users</h1>
            <div class="text-lg py-3">&nbsp;</div>
        </div>
        <div>
            <button id="add_new" class="text-5xl h-16 w-16 bg-mo_ora text-white" data-before="+"></button>
        </div>
    </div>
    <div>
        <div>
            <livewire:users-table>
        </div>
        <div class="mt-4">
            <form action="/attach" method="post" class="justify-center flex gap-4">
                @csrf
                <select class="select-single h-full w-1/3 text-mo_dar px-4 py-2" name="user" required>
                    <option value="">User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <select class="select-single h-full w-1/3 text-mo_dar px-4 py-2" name="client" required>
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
