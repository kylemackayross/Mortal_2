@extends('dashboard')

@section('title', 'Clients')

@section('content')

    <div class="flex justify-between select-none">
        <div>
            <a href="/" class="underline underline-offset-4 text-center text-lg font-semibold text-mo_red hover:text-mo_dar">Back</a>
        </div>
        <div class="text-center">
            <h3 class="text-lg font-semibold text-mo_ora">Dashboard</h3>
            <h1 class="text-4xl font-semibold">Manage clients</h1>
            <div class="text-lg py-3">&nbsp;</div>
        </div>
        <div>
            <a href="/client/create"><button id="add_new" class="text-5xl h-16 w-16 bg-mo_ora text-white hover:text-mo_dar hover:bg-transparent hover:border-2 border-mo_ora transition duration-200" data-before="+"></button></a>
        </div>
    </div>
    <div>
        <div>

            <livewire:clients-table>

        </div>
        <div class="mt-4">
            <form action="/attach" method="post" class="justify-center gap-4 sm:flex">
                @csrf
                <select class="select-single h-full w-full sm:w-1/3 text-mo_dar px-4 py-2 my-2" name="user" required>
                    <option value="">User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <select class="select-single h-full w-full sm:w-1/3 text-mo_dar px-4 py-2 my-2" name="client" required>
                    <option value="">Client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->company }}</option>
                    @endforeach
                </select>

                <button class="h-full w-full sm:w-1/4 text-mo_red font-semibold ring-2 ring-mo_red py-2 px-10 hover:text-white hover:bg-mo_red transition duration-200 my-2" type="submit">
                    ATTACH
                </button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
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
