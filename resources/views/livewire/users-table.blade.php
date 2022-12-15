<div>
    <div class="w-full pb-10">
        <div class="mx-1">
            <input wire:model.debounce.300ms="search" type="search"
                class="h-12 block w-full bg-white text-gray-700 border border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search users...">
        </div>
    </div>
    {{--  scrollbar scrollbar-thin scrollbar-thumb-mo_bla scrollbar-track-mo_dar  scrollbar-thumb-rounded-xl scrollbar-track dark:scrollbar-thumb-mo_red --}}
    <div class="h-96 overflow-auto scrollbar scrollbar-track-white scrollbar-corner-white scrollbar-thumb-mo_dar dark:scrollbar-thumb-mo_bla scrollbar-thumb-rounded-xl scrollbar-track hover:scrollbar-thumb-mo_red transition duration-200 dark:scrollbar-corner-mo_dar dark:scrollbar-track-mo_dar pr-4 pb-4 scrollbar dark:dark">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-mo_dar text-mo_ora dark:bg-mo_bla border border-mo_dar dark:border-mo_bla">
                    <th class="truncate px-6 py-3 tracking-wider text-left"></th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Name</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Email</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Role</th>
                    <th class="truncate px-6 py-3 tracking-wider text-left">Clients</th>
                </tr>
            </thead>
            <tbody>
                <tr class="new-item-row closed truncate border px-4 py-2" style="display:none;">
                    <form action="/user/create" method="post">
                        @csrf

                        <td class="truncate border border-mo_dar dark:border-mo_bla">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-20 px-4 py-2">Save</button>
                            </div>
                        </td>

                        <td class="truncate border border-mo_dar dark:border-mo_bla">
                            <input type="text" name="name" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Name" required>
                        </td>

                        <td class="truncate border border-mo_dar dark:border-mo_bla">
                            <input type="email" name="email" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Email" required>
                        </td>

                        <td class="truncate border border-mo_dar dark:border-mo_bla">
                            <select type="text" name="role" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Role" required>
                                <option value="">Role</option>
                                <option value="CSM">CSM</option>
                                <option value="Designer">Designer</option>
                                <option value="IS">IS</option>
                                <option value="Tech">Tech</option>
                                <option value="Copywriter">Copywriter</option>
                                <option value="Admin">Admin</option>
                            </select>
                            {{-- <input type="text" name="role" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Role" required> --}}
                        </td>

                        <td class="truncate border border-mo_dar dark:border-mo_bla">
                            @foreach ($clients as $client)
                                <div><input type="checkbox" name="clients[]" class="form-control mb-4 text-mo_dar" value="{{ $client->id }}">
                                <label for="clients[]">{{ $client->company }}</label></div>
                            @endforeach
                        </td>

                    </form>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">
                            <div class="flex gap-4 text-2xl">
                                <form action="/user/delete/{{ $user->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt text-mo_red"></i></button>
                                </form>
                                <button type="submit" class="btn btn-danger btn-sm edit-row" data-row="#edit-row-{{ $user->id }}"><i class="fas fa-cog text-mo_blu"></i></button>
                            </div>
                        </td>
                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">{{ ucfirst($user->name) }}</td>
                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">{{ $user->email }}</td>
                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">{{ $user->role }}</td>
                        <td class="truncate border border-mo_dar dark:border-mo_bla px-4 py-2">
                            @foreach ($user->clients as $client)
                                <form action="/detach/{{$user->id}}/{{$client->id}}" method="post">
                                    @csrf
                                    <button type="submit">
                                        {{ $client->company }}
                                    </button>
                                </form>
                            @endforeach
                        </td>
                    </tr>

                    <tr id="edit-row-{{$user->id}}" class="row-edit closed" style="display:none;">
                        <form action="/user/edit/{{$user->id}}" method="post">
                            @csrf
    
                            <td class="truncate border border-mo_dar dark:border-mo_bla">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-20 px-4 py-2">Save</button>
                                </div>
                            </td>
    
                            <td class="truncate border border-mo_dar dark:border-mo_bla">
                                <input type="text" name="name" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Name" value="{{$user->name}}" required>
                            </td>
    
                            <td class="truncate border border-mo_dar dark:border-mo_bla">
                                <input type="email" name="email" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Email" value="{{$user->email}}" required>
                            </td>
    
                            <td class="truncate border border-mo_dar dark:border-mo_bla">
                                <select type="text" name="role" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Role" value="{{$user->role}}" required>
                                    <option value="">Role</option>
                                    <option value="CSM">CSM</option>
                                    <option value="Designer">Designer</option>
                                    <option value="IS">IS</option>
                                    <option value="Tech">Tech</option>
                                    <option value="Copywriter">Copywriter</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                {{-- <input type="text" name="role" class="h-full w-full text-mo_dar px-4 py-2" placeholder="Role" required> --}}
                            </td>
                            <td class="truncate border border-mo_dar dark:border-mo_bla"></td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- {{ $users->links('livewire.custom-pagination') }} --}}
    {{ $users->links() }}
</div>