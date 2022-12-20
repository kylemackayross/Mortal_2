@extends('dashboard')

@section('title', 'Passwords')

@section('content')

    <div class="flex justify-between">
        <div>
            <a href="/" class="underline underline-offset-4 text-center text-lg font-semibold text-mo_red hover:text-mo_dar">Back</a>
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
