<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mortal') }}</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <!-- Custom -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        {{-- <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> --}}
        <script src="http://localhost:8000/assets\tinymce\js\tinymce\tinymce.min.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- <link rel="preload" as="style" href="https://mortal.marketsonline.co.za/build/assets/app.a3ce8b2c.css">
        <link rel="modulepreload" href="https://mortal.marketsonline.co.za/build/assets/app.999357ab.js">
        <link rel="stylesheet" href="https://mortal.marketsonline.co.za/build/assets/app.a3ce8b2c.css">
        <script type="module" src="https://mortal.marketsonline.co.za/build/assets/app.999357ab.js"></script> --}}

        

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-poppins antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 bg-gradient-to-r from-mo_pur/5 to-mo_red/20">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            
        </div>
        
        

        <style>
            .bug{
                position: absolute;
                display: none;
            }

            .countdown{
                display: none;
            }

            .bug-form{
                display: none;
            }

            .bug-modal{
                display: none;
                background: rgba(0, 0, 0, 0.3)
            }
        </style>

        <div class="bug-modal fixed min-h-screen w-full top-0 left-0 text-5xl text-stone-700">

            <div class="countdown" id="counter"></div>

            <i class="fas fa-bug bug" data="0"></i>
            <i class="fas fa-bug bug" data="1"></i>
            <i class="fas fa-bug bug" data="2"></i>
            <i class="fas fa-bug bug" data="3"></i>
            <i class="fas fa-bug bug" data="4"></i>
            <i class="fas fa-bug bug" data="5"></i>
            <i class="fas fa-bug bug" data="6"></i>
            <i class="fas fa-bug bug" data="7"></i>
            <i class="fas fa-bug bug" data="8"></i>
            <i class="fas fa-bug bug" data="9"></i>

            <div class="bug-form py-12 mx-auto max-w-xl">
                
                <form class="p-10 bg-white border rounded-lg text-base shadow" action="/report/create" method="post">
                    @csrf
                    <h2 class="text-center text-xl font-semibold mb-5">Feedback</h2>
                    <p class="text-sm mb-5">Hi! Please enter what issue  you've run into or an idea for a feature below.<br>Any and all feedback is appreciated :)</p>
                    <Select type="text" name="type" class="h-full w-full text-mo_dar px-4 py-2 mb-2" placeholder="Company" required>
                        <option value="">Feedback type</option>
                        <option value="bug">Bug</option>
                        <option value="feature">Feature</option>
                    </Select>
                    <textarea type="text" name="report" class="h-full w-full text-mo_dar px-4 py-2 mb-5" placeholder="Feedback report" required></textarea>
                    <div class="flex justify-between">
                        <button type="submit" class="text-mo_red font-semibold ring-2 ring-mo_red py-2 px-10 hover:text-white hover:bg-mo_red transition duration-200">Send</button>
                        <button id="close" class="text-mo_dar font-semibold py-2 px-10 hover:text-mo_red transition duration-200">Close</button>
                    </div>
                </form>
            </div>
            
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var firstclick = true;
                var Winner = false;

                jQuery(".bug-report").on("click", function() {
                    jQuery(".bug-modal").css("display", "block");
                    jQuery(".bug").css("display", "none");
                    jQuery(".bug-form").css("display", "block");
                });


                jQuery(".bugreport").on("click", function() {
                    jQuery(".bug-modal").css("display", "block");

                    if (firstclick) {
                        alert("Oh no, you just squashed a member of the bug mafia! They're going to send their goons to take you out. Better squish them all before they find a way out of your screen!")
                        jQuery(".bug").css("display", "block");
                        begin();
                        firstclick = false; 
                    } else {
                        jQuery(".bug").css("display", "none");
                        jQuery(".bug-form").css("display", "block");
                    }
                    
                });

                jQuery("#close").on("click", function() {
                    jQuery(".bug-modal").css("display", "none");
                });

                var bug = [];

                jQuery(".bug").on("click", function() {
                    // alert("clicked " + jQuery(this).attr("data"));
                    jQuery(this).removeClass("fas fa-bug").addClass("fas fa-virus").css("color", "green");
                    squish(jQuery(this).attr("data"));
                });

                function begin() {
                    var countdown = 15;

                    var myfunc = setInterval(function() {
                    jQuery("#counter").css("display","block");
                    jQuery("#counter").text(countdown);
                    countdown -= 1;
                    if (countdown==-2) {
                        clearInterval(myfunc);
                        alert("Gameover. Unfortunately those pesky critters escaped. Oh well guess you'll have to add them to the bug report...")
                        gameover2();
                    }
                    if (Winner){
                        clearInterval(myfunc);
                    }
                    }, 1000);

                    for (let index = 0; index < $('.bug').length; index++) {
                        const element = document.getElementsByClassName('bug')[index];
                        bug.push("alive");
                        movebug(element, index);
                    }
                }

                function start(params){
                    var angle = Math.floor(Math.random() * 360);
                    $(params).css("transform", "rotate("+(90+angle)+"deg)");
                    console.log(angle);
                    return angle;
                }

                function squish(index){
                    bug[index] = "dead";
                    var countdead = 0
                    for (let i = 0; i < bug.length; i++) {
                        if (bug[i] == "dead") {
                            countdead++;
                        };
                    }
                    if (bug.length == countdead) {
                        setTimeout(gameover,100);
                    }
                };

                function movebug(params, index) {
                    
                    var box = params,
                    top = 0,
                    left = 0,
                    speed = 1,
                    angle = start(params) * Math.PI / 180;

                    var loop = setInterval(function() {
                    deltaX = Math.cos(angle) * speed;
                    deltaY = Math.sin(angle) * speed;

                    if (bug[index] == "dead") {
                        clearInterval(loop);
                    }

                    var height = window.innerHeight;
                    var width = window.innerWidth;

                    var tp = box.style.top.split("p");
                    var lt = box.style.left.split("p");

                    if (parseInt(tp[0]) > height) {
                        top = -64;
                    }
                    if(parseInt(tp[0]) < -64) {
                        top = height;
                    }
                    if(parseInt(lt[0]) > width) {
                        left = -64;
                    } 
                    if(parseInt(lt[0]) < -64) {
                        left = width;
                    }

                    box.style.top = (top += deltaY) + 'px';
                    box.style.left = (left += deltaX) + 'px';

                    console.log(tp[0] + " : " + height);
                    console.log(lt[0] + " : " + width);          
                    
                }, 1);
                }
                
                function gameover2() {
                    jQuery(".bug").css("display", "none");
                    jQuery(".bug-form").css("display", "block");
                    jQuery("#counter").css("display","none");
                }

                function gameover() {
                    Winner = true;
                    alert("Nice you totally got them all! Thanks for cleaning out those bugs, did me a huge favour. Now you can let me know of any other bugs you may have found.");
                    jQuery(".bug").css("display", "none");
                    jQuery(".bug-form").css("display", "block");
                    jQuery("#counter").css("display","none");

                    axios.post('/winner', {
                        id: {{\Auth::user()->id}},
                    })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
                
            });

        </script>

        @stack('modals')

        @livewireScripts
    </body>
</html>
