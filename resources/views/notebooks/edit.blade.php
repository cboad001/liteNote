@php use App\Models\Notebook; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Notebooks
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-100 to-blue-200">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-xl">
                <form action="{{route('notebooks.update', $notebook)}}" method="post">
                    @method('PUT')
                    @csrf

                    <x-text-input name="name" class="w-full" placeholder="Notebook title"
                                  value="{{@old('title',$notebook->name)}}"></x-text-input>
                    @error('title')
                    <div class="text-sm mt-1 test-red-500">{{$message}}</div>
                    @enderror


{{--                    <select name="note_id" class="w-full mt-6 block font-medium text-sm text-gray-700 dark:text-gray-300">--}}
{{--                        <option value="Select Note" >Select A Note</option>--}}
{{--                        @foreach($notes as $note)--}}
{{--                            <option value="{{$note->id }}"--}}
{{--                                    @if($notebook->id === $note->notebook_id)--}}
{{--                                        selected--}}
{{--                                @endif--}}
{{--                            >{{$notebook->name}}</option>--}}
{{--                        @endforeach--}}

{{--                    </select>--}}
                    <div class="flex gap-4 mt-6">
                        <x-primary-button>Save Notebook</x-primary-button>
                        <a href="{{route('notebooks.show', $notebook)}}" class="inline-flex items-center px-4 py-2 bg-gray-500 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-200 uppercase tracking-widest hover:bg-gray-600 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-700 active:bg-gray-900 dark:active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
