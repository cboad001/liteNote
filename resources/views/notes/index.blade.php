<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{request()->routeIs('notes.index')?'Notes':'Trash'}}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-100 to-blue-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">
            <x-alert-success>{{session('success')}}</x-alert-success>
            @if(request()->routeIs('notes.index'))
                <x-link-button href="{{route('notes.create')}}">
                    + New Note
                 </x-link-button>
{{--            @else--}}
{{--                <button >delete</button>--}}
            @endif
            @forelse($notes as $note)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
{{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}

{{--                       <div>--}}
                           <h2 class="font-bold text-2xl text-blue-600">
                               <a
                                   @if(request()->routeIs('notes.index'))
                                        href="{{route('notes.show', $note)}}"
                                   @else
                                       href="{{route('trashed.show', $note)}}"
                                   @endif
                                   class="hover:underline" >{{$note->title}}</a>
                           </h2>

                            {!! Str::limit($note->text, 200, '...')!!}
                            @if($note->notebook)
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                    <strong>Notebook:</strong> <a href="{{route('notebooks.show', $note->notebook)}}" class="text-blue-600 dark:text-blue-400 hover:underline">{{$note->notebook->name}}</a>
                                </p>
                            @endif
                            <span class="block mt-4 text-sm opacity-70">{{$note->updated_at->diffForHumans()}}</span>
{{--                       </div>--}}

{{--                </div>--}}
            </div>
            @empty
                <p>You have no notes yet</p>
            @endforelse
            {{$notes->links()}}
        </div>
    </div>
<!-- {{--    {{ Str::limit(strip_tags($note->text), 200, '...') }}--}} -->
</x-app-layout>
<!-- {{--<style>--}}
{{--    ul,ol{--}}
{{--        list-style: none;--}}
{{--    }--}}
{{--</style>--}}
{{--<div class="prose dark:prose-invert max-w-none" style="list-style-type: disc">--}}
{{--    {!! ($note->text) !!}--}}
{{--</div>--}} -->


