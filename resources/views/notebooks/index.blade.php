<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Notebooks
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-100 to-blue-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-link-button href="{{route('notebooks.create')}}">
                + New Notebook
            </x-link-button>
            @forelse($notebooks as $notebook)
                <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg p-6">

                    <h2 class="font-bold text-2xl text-blue-600">
                        <a href="{{route('notebooks.show', $notebook)}}" class="hover:underline" >{{$notebook->name}}</a>
                    </h2>

{{--                    <span class="block mt-4 text-sm opacity-70">{{$notebook->updated_at->diffForHumans()}}</span>--}}
                </div>
            @empty
                <p>You have no notebooks yet</p>
            @endforelse
{{--            {{$notebooks->links()}}--}}
        </div>
    </div>
</x-app-layout>
