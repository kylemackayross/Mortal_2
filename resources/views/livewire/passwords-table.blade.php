<div>
    <div class="inline-flex w-full pb-10">
        <div class="mx-1 w-3/4">
            <input wire:model.debounce.300ms="search" type="search"
                class="h-12 block w-full bg-white text-gray-700 border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-mo_red focus:ring-mo_red" placeholder="Search passwords...">
        </div>
        <div class="mx-1 w-1/4">
            {{-- <input wire:model.debounce.300ms="search" type="search"
            class="h-12 block w-full bg-white text-gray-700 border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-mo_red focus:ring-mo_red"  placeholder="Search clients..."> --}}
            <select wire:model="company" class="select-single h-12 block w-full bg-white text-gray-700 border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-mo_red focus:ring-mo_red" id="grid-state">
                <option value="">Company</option>
                @foreach ($clients->sortBy('company') as $client)
                    <option value="{{ $client->id }}">{{ $client->company }}</option>
                @endforeach
            </select>
        </div>
        @if (Auth::user()->role == "Admin")       
        <div class="mx-1 w-1/4">
            {{-- <input wire:model.debounce.300ms="search" type="search"
            class="h-12 block w-full bg-white text-gray-700 border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-mo_red focus:ring-mo_red"  placeholder="Search clients..."> --}}
            <select wire:model="show" class="h-12 block w-full bg-white text-gray-700 border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-mo_red focus:ring-mo_red" id="grid-state">
                <option value="all">Filter by</option>
                <option value="unarchived">Unarchived</option>
                <option value="archived">Archived</option>
            </select>
        </div>
        @endif
    </div>
    <div class="h-96 overflow-auto scrollbar scrollbar-track-white scrollbar-corner-white scrollbar-thumb-mo_dar scrollbar-thumb-rounded-xl scrollbar-track hover:scrollbar-thumb-mo_red transition duration-200 pr-4 pb-4 scrollbar">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-mo_gra/10 text-mo_ora border border-mo_gra/10">
                    <th class="truncate px-6 py-3 tracking-wider text-left"></th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Company</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Name</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Service</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">URL</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Username</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">New Password</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Old Password</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr class="new-item-row closed truncate px-4 py-2" style="display:none;">
                    <form action="/password/create" method="post">
                        @csrf

                        <td class="border border-mo_gra/10">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-20 px-4 py-2">Save</button>
                            </div>
                        </td>

                        <td class="border border-mo_gra/10">
                            <Select type="text" name="company" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Company" required>
                                <option value="">Company</option>
                                @foreach ($clients->sortBy('company') as $client)
                                    <option value="{{ $client->id }}">{{ $client->company }}</option>
                                @endforeach
                            </Select>
                        </td>

                        <td class="border border-mo_gra/10">
                            <input type="text" name="name" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Name" required>
                        </td>

                        <td class="border border-mo_gra/10">
                            <input type="text" name="service" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Service" required>
                        </td>

                        <td class="border border-mo_gra/10">
                            <input type="text" name="address" class="h-full w-full text-mo_dar px-4 py-2" placeholder="URL" required>
                        </td>

                        <td class="border border-mo_gra/10">
                            <input type="text" name="username" class="h-full w-full text-mo_dar px-4 py-2" placeholder="username" required>
                        </td>

                        <td class="border border-mo_gra/10">
                            <input type="text" name="new_password" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Password" required>
                        </td>

                        <td class="border border-mo_gra/10">
                            <input type="text" name="old_password" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Old Password" disabled>
                        </td>

                        <td class="border border-mo_gra/10">
                            <textarea type="text" name="notes" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Notes" style="min-height: 40px;
                            margin: 0px 0px -7px; height:40px;"></textarea>
                        </td>

                    </form>
                </tr>
                @foreach ($passwords as $password)
                    @if ($password->is_archived)
                    @if (Auth::user()->role == "Admin")
                    <tr class="{{ $password->is_archived ? "bg-mo_yel text-mo_dar" : "" }}">
                        <td class="border border-mo_gra/10 px-4 py-2">
                            <div class="flex gap-4 text-2xl">
                                @if ($password->is_archived)
                                <form action="/password/unarchive/{{ $password->id }}" method="post">
                                    @csrf
                                    
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-folder-open text-mo_dar"></i></button>
                                </form>
                                @else
                                <form action="/password/archive/{{ $password->id }}" method="post">
                                    @csrf
                                    
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-folder text-mo_yel"></i></button>
                                </form>
                                @endif
                                
                                <button type="submit" class="btn btn-danger btn-sm edit-row" data-row="#edit-row-{{ $password->id }}"><i class="fas fa-cog text-mo_blu"></i></button>
                                <form action="/password/delete/{{ $password->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash text-mo_red"></i></button>
                                </form>
                            </div>
                        </td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->client->company }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ ucfirst($password->name) }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->service }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->address }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->username }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->new_password }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->old_password }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->notes }}</td>
                    </tr>
                    <tr id="edit-row-{{$password->id}}" class="{{ $password->is_archived ? "bg-mo_yel text-mo_dar" : "" }} row-edit closed" style="display:none;">
                        <form action="/password/edit/{{$password->id}}" method="post">
                            @csrf
    
                            <td class="border border-mo_gra/10">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-20 px-4 py-2">Save</button>
                                </div>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <Select type="text" name="company" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Company" required>
                                    <option value="">Company</option>
                                    @foreach ($clients->sortBy('company') as $client)
                                        <option value="{{ $client->id }}">{{ $client->company }}</option>
                                    @endforeach
                                </Select>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="name" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Name" value="{{ ucfirst($password->name) }}" required>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="service" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Service" value="{{ $password->service }}" required>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="address" class="h-full w-full text-mo_dar px-4 py-2" placeholder="URL" value="{{ $password->address }}" required>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="username" class="h-full w-full text-mo_dar px-4 py-2" placeholder="username" value="{{ $password->username }}" required>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="new_password" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Password" value="{{ $password->new_password }}" required>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="old_password" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Old Password" value="{{ $password->old_password }}" disabled>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <textarea type="text" name="notes" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Notes" style="min-height: 40px;
                                margin: 0px 0px -7px; height:40px;">{{ $password->notes }}</textarea>
                            </td>
    
                        </form>
                    </tr>
                    @endif
                    @else

                    <tr class="{{ $password->is_archived ? "bg-mo_yel text-mo_dar" : "" }}">
                        <td class="border border-mo_gra/10 px-4 py-2">
                            <div class="flex gap-4 text-2xl">
                                @if ($password->is_archived)
                                <form action="/password/unarchive/{{ $password->id }}" method="post">
                                    @csrf
                                    
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-folder-open text-mo_dar"></i></button>
                                </form>
                                @else
                                @if (Auth::user()->role == "Admin")
                                <form action="/password/archive/{{ $password->id }}" method="post">
                                    @csrf
                                    
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-folder text-mo_yel"></i></button>
                                </form>
                                @endif
                                @endif
                                <button type="submit" class="btn btn-danger btn-sm edit-row" data-row="#edit-row-{{ $password->id }}"><i class="fas fa-cog text-mo_blu"></i></button>
                                @if (Auth::user()->role == "Admin")
                                <form action="/password/delete/{{ $password->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash text-mo_red"></i></button>
                                </form>
                                @endif
                            </div>
                        </td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->client->company }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ ucfirst($password->name) }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->service }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->address }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->username }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->new_password }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->old_password }}</td>
                        <td class="border border-mo_gra/10 px-4 py-2">{{ $password->notes }}</td>
                    </tr>
                    <tr id="edit-row-{{$password->id}}" class="{{ $password->is_archived ? "bg-mo_yel text-mo_dar" : "" }} row-edit closed" style="display:none;">
                        <form action="/password/edit/{{$password->id}}" method="post">
                            @csrf
    
                            <td class="border border-mo_gra/10">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-20 px-4 py-2">Save</button>
                                </div>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <Select type="text" name="company" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Company" required>
                                    <option value="">Company</option>
                                    @foreach ($clients->sortBy('company') as $client)
                                        <option value="{{ $client->id }}">{{ $client->company }}</option>
                                    @endforeach
                                </Select>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="name" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Name" value="{{ ucfirst($password->name) }}" required>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="service" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Service" value="{{ $password->service }}" required>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="address" class="h-full w-full text-mo_dar px-4 py-2" placeholder="URL" value="{{ $password->address }}" required>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="username" class="h-full w-full text-mo_dar px-4 py-2" placeholder="username" value="{{ $password->username }}" required>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="new_password" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Password" value="{{ $password->new_password }}" required>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <input type="text" name="old_password" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Old Password" value="{{ $password->old_password }}" disabled>
                            </td>
    
                            <td class="border border-mo_gra/10">
                                <textarea type="text" name="notes" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Notes" style="min-height: 40px;
                                margin: 0px 0px -7px; height:40px;">{{ $password->notes }}</textarea>
                            </td>
    
                        </form>
                    </tr>

                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $passwords->links() }}
</div>