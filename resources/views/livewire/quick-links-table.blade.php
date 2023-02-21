<div>
    <div class="inline-flex w-full pb-10">
        <div class="mx-1 w-full">
            <input wire:model.debounce.300ms="search" type="search"
                class="h-12 block w-full bg-white text-gray-700 border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-mo_red focus:ring-mo_red" placeholder="Search quicklinks...">
        </div>
    </div>
    <style>
        .quicklinks button{
            display: none;
        }
        .quicklinks li:hover button{
            display: block;
        }
        .quicklinks li:hover{
            background-color: #EFEFEF;
        }
    </style>
    <div>
        
        @foreach ($quicklinks as $quicklink)
            <ul class="list-disc ml-10 quicklinks">
                <li class="flex justify-between">
                    <a href="{{$quicklink->url}}" rel="nofollow" target="_blank">{{$quicklink->name}}</a>
                    <form action="/quicklink/delete/{{ $quicklink->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm text-mo_red">Remove</button>
                    </form>
                </li>
            </ul>   
        @endforeach
    </div>
    {{ $quicklinks->links() }}
</div>