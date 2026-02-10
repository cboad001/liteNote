<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Notebooks
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-100 to-blue-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mb-4">
                <a href="{{route('notebooks.index')}}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold">
                    &larr; Back to Notebooks
                </a>
            </div>
{{--            <x-alert-success>{{session('success')}}</x-alert-success>--}}

            <div class="flex gap-6">

                <p class="opacity-70"><strong>Created:</strong> {{$notebook->created_at->diffForHumans()}}&nbsp;&nbsp;</p>

                <p class="opacity-70"><strong>Last Updated:</strong> {{$notebook->updated_at->diffForHumans()}}</p>

            </div>

{{--            @forelse($notebooks as $notebook)--}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                    <div class="flex justify-between items-center gap-4">
                        <h2 class="font-bold text-2xl text-blue-600">
                            <a href="{{route('notebooks.show', $notebook)}}" class="hover:underline" >{{$notebook->name}}</a>
                        </h2>
                        <x-link-button href="{{route('notebooks.edit',$notebook)}}">Edit Notebook</x-link-button>
                    </div>

                </div>

                <!-- Display Notes -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-xl text-gray-700 dark:text-gray-300">Notes in this Notebook</h3>
                        <a href="{{route('notes.create')}}" class="text-blue-600 dark:text-blue-400 hover:underline font-semibold">+ New Note</a>
                    </div>
                    
                    @forelse($notes as $note)
                        <div class="border-l-4 border-blue-500 pl-4 mb-4 p-3 bg-gray-50 dark:bg-gray-700 rounded">
                            <h4 class="font-semibold text-lg text-gray-800 dark:text-gray-200">
                                <a href="{{route('notes.show', $note)}}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                    {{$note->title}}
                                </a>
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">{!! Str::limit($note->text, 150) !!}</p>
                            <p class="text-gray-500 dark:text-gray-500 text-xs mt-2">Created {{$note->created_at->diffForHumans()}}</p>
                        </div>
                    @empty
                        <p class="text-gray-500 dark:text-gray-400">No notes in this notebook yet.</p>
                    @endforelse
                </div>

{{--            @empty--}}
{{--                <p>You have no notebooks yet</p>--}}
{{--            @endforelse--}}
        </div>
    </div>
</x-app-layout>
