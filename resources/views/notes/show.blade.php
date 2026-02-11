@php use function PHPUnit\Framework\isNull; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$note->trashed()?'Trash': 'Notes'}}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-100 to-blue-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mb-4 flex gap-4">
                <a href="{{route('notes.index')}}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold">
                    &larr; Back to Notes
                </a>
                @if($note->notebook_id)
                    <a href="{{route('notebooks.show', $note->notebook)}}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold">
                        → Go to Notebook
                    </a>
                @endif
            </div>
            <x-alert-success>{{session('success')}}</x-alert-success>
{{--            @if($notebook !== null )--}}
{{--                <span class="border-gray-700 px-2 py-1 rounded text-sm">{{$notebook->name}}</span>--}}
{{--            @endif--}}
            @if(!$note->trashed())
            <div class="flex gap-6">
                <p class="opacity-70"><strong>Created:</strong> {{$note->created_at->diffForHumans()}}&nbsp;&nbsp;</p>

                <p class="opacity-70"><strong>Last Updated:</strong> {{$note->updated_at->diffForHumans()}}</p>
                <x-link-button href="{{route('notes.edit',$note)}}" class="ml-auto">Edit Note</x-link-button>
                <form action="{{route('notes.destroy',$note)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <x-primary-button class="bg-red-400 hover:bg-red-500 px-4 py-2"
                                      onclick="return confirm('Are you sure you to move to thrash')"
                    >Move to Trash
                    </x-primary-button>
                </form>
            </div>
                @else
            <div class="flex gap-6">
                <p class="opacity-70"><strong>Deleted:</strong> {{$note->deleted_at->diffForHumans()}}</p>
{{--                <x-link-button href="{{route('notes.edit',$note)}}" class="ml-auto bg-red-600">Delete Note Permanently</x-link-button>--}}
                <form action="{{route('trashed.update', $note)}}" method="post" class="ml-40">
                    @method('put')
                    @csrf
                    <x-primary-button >Restore Note</x-primary-button>
                </form>
                <form action="{{route('trashed.destroy',$note)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <x-primary-button class="bg-red-400 hover:bg-red-500"
                                      onclick="return confirm('Are you sure you to permanently delete this note??')"
                    >Delete Permanently
                    </x-primary-button>
                </form>
            </div>
            @endif

            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-4xl text-indigo-600">
                    {{$note->title}}
                </h2>

                <div class="mt-2 whitespace-pre-wrap list-group">{!! $note->text !!}</div>
                
            </div>
            
        </div>
        
    </div>
    
    <!-- <input type="checkbox">hi
    <ul class="list-style-type:disc"> <li>hey</li></ul>
            <ul class="">{!! $note->text !!}</ul> -->
</x-app-layout>
<div>
                    <ul>
                        <li>key</li>
                    </ul>
                </div>

