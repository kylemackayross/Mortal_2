@extends('dashboard')

@section('content')
    <div class="flex justify-between">
        <div>
            <a href="/clients" class="underline underline-offset-4 text-center text-lg font-semibold text-mo_red hover:text-mo_dar dark:hover:text-white">Back</a>
        </div>
        <div class="text-center">
            <h3 class="text-lg font-semibold text-mo_ora">Dashboard</h3>
            <h1 class="text-4xl font-semibold">Create client</h1>
            <div class="text-lg py-3">&nbsp;</div>
        </div>
        <div>
        </div>
    </div>
    <div class="mx-auto max-w-lg">
        <form action="/client/store" method="post">
            @csrf

            {{-- <div class="px-4 py-2">
                <input type="text" name="name" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Name" required>
            </div> --}}

            <div class="py-2">
                <input type="text" name="company" class="p-4 text-lg shadow-sm border-mo_dar dark:text-mo_dar ring-2 ring-mo_dar focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:text-mo_dar bg-white placeholder:font-medium w-full" placeholder="Company Name" required>
            </div>

            <div class="py-2">
                <input type="text" name="type" class="p-4 text-lg shadow-sm border-mo_dar dark:text-mo_dar ring-2 ring-mo_dar focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:text-mo_dar bg-white placeholder:font-medium w-full" placeholder="Company Type" required>
            </div>

            <div class="py-2">
                <input type="email" name="email" class="p-4 text-lg shadow-sm border-mo_dar dark:text-mo_dar ring-2 ring-mo_dar focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:text-mo_dar bg-white placeholder:font-medium w-full" placeholder="Group Email" required>
            </div>

            <h3 class="text-xl font-semibold pt-2">Users</h3>
            <div class="py-2 grid grid-cols-3">
                
                @foreach ($users as $user)
                <div>
                    <label for="users" class="inline-flex items-center">
                        <input type="checkbox" class="rounded w-6 h-6 border-mo_dar text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 accent-mo_red" name="users[]" value="{{ $user->id }}">
                        <span class="ml-2 text-sm text-mo_dar dark:text-white">{{ $user->name }}</span>
                    </label>
                </div>
                    {{-- <div>
                        <input type="checkbox" name="users[]" class="rounded w-6 h-6 border-mo_dar text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 accent-mo_red" " value="{{ $user->id }}">
                        <label for="users[]">{{ $user->name }}</label>
                    </div> --}}
                @endforeach
            </div>

            <div class="grid sm:grid-cols-2 gap-4 py-2">
                <div class="">
                    <select type="text" name="csm" class="p-4 text-lg shadow-sm border-mo_dar dark:text-mo_dar ring-2 ring-mo_dar focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:text-mo_dar bg-white placeholder:font-medium w-full" placeholder="CSM">
                        <option val="">CSM</option>
                        @foreach ($users as $user)
                        <option val="{{ $user->email }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="">
                    <select type="text" name="is" class="p-4 text-lg shadow-sm border-mo_dar dark:text-mo_dar ring-2 ring-mo_dar focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:text-mo_dar bg-white placeholder:font-medium w-full" placeholder="IS">
                        <option val="">IS</option>
                        @foreach ($users as $user)
                        <option val="{{ $user->email }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <select type="text" name="tech" class="p-4 text-lg shadow-sm border-mo_dar dark:text-mo_dar ring-2 ring-mo_dar focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:text-mo_dar bg-white placeholder:font-medium w-full" placeholder="Tech">
                        <option val="">Tech</option>
                        @foreach ($users as $user)
                        <option val="{{ $user->email }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="">
                    <select type="text" name="designer" class="p-4 text-lg shadow-sm border-mo_dar dark:text-mo_dar ring-2 ring-mo_dar focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:text-mo_dar bg-white placeholder:font-medium w-full" placeholder="Designer">
                        <option val="">Designer</option>
                        @foreach ($users as $user)
                        <option val="{{ $user->email }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="py-2">
                <input type="text" name="gdl" class="p-4 text-lg shadow-sm border-mo_dar dark:text-mo_dar ring-2 ring-mo_dar focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:text-mo_dar bg-white placeholder:font-medium w-full" placeholder="Google Drive Link" required>
            </div>

            <div class="py-2">
                <input type="text" name="agreement" class="p-4 text-lg shadow-sm border-mo_dar dark:text-mo_dar ring-2 ring-mo_dar focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:text-mo_dar bg-white placeholder:font-medium w-full" placeholder="Agreement Signed" required>
            </div>

            <div class="py-2">
                <input type="text" name="invoice" class="p-4 text-lg shadow-sm border-mo_dar dark:text-mo_dar ring-2 ring-mo_dar focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:text-mo_dar bg-white placeholder:font-medium w-full" placeholder="Invoice Received" required>
            </div>

            <div class="py-2">
                <textarea type="text" name="invoice" class="p-4 text-lg shadow-sm border-mo_dar dark:text-mo_dar ring-2 ring-mo_dar focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 placeholder:text-mo_dar bg-white placeholder:font-medium w-full" placeholder="Additional Notes or Message" required></textarea>
            </div>

            <div class="py-2">
                <label for="users" class="inline-flex items-center">
                    <input type="checkbox" class="rounded w-6 h-6 border-mo_dar text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 accent-mo_red" name="slack" value="true">
                    <span class="ml-2 text-sm text-mo_dar dark:text-white">Create Slack Channel?</span>
                </label>
            </div>
            
            <div class="px-4 py-2">
                <div class="text-center">
                    <button type="submit" class="text-mo_red font-semibold ring-2 ring-mo_red py-2 px-10 hover:text-white hover:bg-mo_red transition duration-200">Save</button>
                </div>
            </div>

        </form>
    </div>

@endsection