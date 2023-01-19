@extends('dashboard')

@section('title', 'Quicklinks')

@section('content')

    <div class="flex justify-between">
        <div>
            <a href="/"
                class="underline underline-offset-4 text-center text-lg font-semibold text-mo_red hover:text-mo_dar">Back</a>
        </div>
        <div class="text-center">
            <h3 class="text-lg font-semibold text-mo_ora">Dashboard</h3>
            <h1 class="text-4xl font-semibold">Manage quicklinks</h1>
            <div class="text-lg py-3">&nbsp;</div>
        </div>
        <div>
            <button id="add_new" class="text-5xl h-16 w-16 bg-mo_ora text-white" data-before="+"></button>
        </div>
    </div>
    <div>

        
        <form action="/quicklink/create" method="post">
            @csrf
            <div class="inline-flex w-full pb-10 new-item-row closed" style="display:none;">
            <div  class="w-1/4 mr-2" >
                <input type="text" name="name" class="w-full text-mo_dar px-4 py-2" placeholder="Name"
                    required>
            </div>

            <div class="w-1/2 mr-2" >
                <input type="text" name="url" class="w-full text-mo_dar px-4 py-2" placeholder="Url"
                    required>
            </div>

            <div class="w-1/4" >
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-20 px-4 py-2">Save</button>
                </div>
            </div>
        </div>
        </form>
        

        <div>
            <livewire:quick-links-table>
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


            $(".edit-row").on("click", function() {
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
