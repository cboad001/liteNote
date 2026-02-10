<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Notebooks
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-100 to-blue-200">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-xl">
                <form action="{{route('notebooks.store')}}" method="post" >
                    @csrf
                    <x-text-input name="name" class="w-full" placeholder="Notebook title" value="{{@old('name')}}"></x-text-input>
                    @error('name')
                    <div class="text-sm mt-1 test-red-500">{{$message}}</div>
                    @enderror
                    <x-primary-button class="mt-6">Save Notebook</x-primary-button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
