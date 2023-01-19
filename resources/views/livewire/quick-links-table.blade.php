<div>
    <div class="inline-flex w-full pb-10">
        <div class="mx-1 w-full">
            <input wire:model.debounce.300ms="search" type="search"
                class="h-12 block w-full bg-white text-gray-700 border-gray-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-mo_red focus:ring-mo_red" placeholder="Search quicklinks...">
        </div>
    </div>
    <div>
        @foreach ($quicklinks as $quicklink)
            <ul class="list-disc ml-10">
                <li><a href="{{$quicklink->url}}" rel="nofollow" target="_blank">{{$quicklink->name}}</a></li>
            </ul>   
        @endforeach
    </div>
    {{ $quicklinks->links() }}
</div>