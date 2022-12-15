<div>
    <div class="w-full pb-10">
        <div class="mx-1">
            <input wire:model.debounce.300ms="search" type="search"
                class="h-12 block w-full bg-white text-gray-700 border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search clients...">
        </div>
    </div>
    <div class="h-96 overflow-auto scrollbar scrollbar-track-white scrollbar-corner-white scrollbar-thumb-mo_dar dark:scrollbar-thumb-mo_bla scrollbar-thumb-rounded-xl scrollbar-track hover:scrollbar-thumb-mo_red transition duration-200 dark:scrollbar-corner-mo_dar dark:scrollbar-track-mo_dar pr-4 pb-4 scrollbar dark:dark">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-mo_dar text-mo_ora dark:bg-mo_bla border border-mo_dar dark:border-mo_bla">
                    <th class="truncate px-6 py-3 tracking-wider text-left"></th>
                    {{-- <th class="truncate px-6 py-3 tracking-wider text-left">Name</th> --}}
                    <th class="truncate px-6 py-3 tracking-wider text-left">Company</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Email</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Type</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Google Drive</th> 
                    <th class="truncate px-6 py-3 tracking-wider text-left">Users</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr class="new-item-row closed truncate px-4 py-2" style="display:none;">
                    <form action="/client/create" method="post">
                        @csrf

                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-20 px-4 py-2">Save</button>
                            </div>
                        </td>

                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">
                            <input type="text" name="name" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Name" required>
                        </td>

                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">
                            <input type="email" name="email" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Email" required>
                        </td>

                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">
                            <input type="text" name="role" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Role" required>
                        </td>

                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">
                            <input type="text" name="company" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Company" required>
                        </td>

                        <td class="truncate border border-mo_dar dark:border-mo_bla">
                            @foreach ($users as $user)
                                <div><input type="checkbox" name="users[]" class="form-control mb-4 text-mo_dar" value="{{ $user->id }}">
                                <label for="users[]">{{ $user->name }}</label></div>
                            @endforeach
                        </td>

                    </form>
                </tr> --}}
                @foreach ($clients as $client)
                    <tr>
                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2 px-4 py-2">
                            <div class="flex gap-4 text-2xl">
                                <form action="/client/delete/{{ $client->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt text-mo_red"></i></button>
                                </form>
                                <button type="submit" class="btn btn-danger btn-sm edit-row" data-row="#edit-row-{{ $client->id }}"><i class="fas fa-cog text-mo_blu"></i></button>
                            </div>
                        </td>
                        {{-- <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2 px-4 py-2">{{ ucfirst($client->name) }}</td> --}}
                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2 px-4 py-2">{{ $client->company }}</td>
                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2 px-4 py-2">{{ $client->email }}</td>
                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2 px-4 py-2">{{ $client->type }}</td>
                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2 px-4 py-2">{{ $client->gdl }}</td>
                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2 px-4 py-2">
                            @foreach ($client->users as $user)
                                <form action="/detach/{{$user->id}}/{{$client->id}}" method="post">
                                    @csrf
                                    <button type="submit">
                                        {{ $user->name }}
                                    </button>
                                </form>
                            @endforeach
                        </td>
                    </tr>
                    <tr id="edit-row-{{$client->id}}" class="row-edit closed" style="display:none;">
                        <form action="/client/edit/{{$client->id}}" method="post">
                            @csrf
    
                            <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-20 px-4 py-2">Save</button>
                                </div>
                            </td>

                            <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">
                                <input type="text" name="company" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Role" value="{{$client->company}}" required>
                            </td>
    
                            <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">
                                <input type="email" name="email" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Email" value="{{$client->email}}">
                            </td>
    
                            <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">
                                <input type="text" name="type" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Role" value="{{$client->type}}">
                            </td>

                            <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2"></td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $clients->links() }}
</div>
