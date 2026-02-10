<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Notes
        </h2>
    </x-slot>
    <div class="py-12 bg-gradient-to-r from-blue-100 to-blue-200">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-xl">
                <form action="{{route('notes.update', $note)}}" method="post">
                    @method('PUT')
                    @csrf

                    <x-text-input name="title" class="w-full" placeholder="Note title"
                                  value="{{@old('title',$note->title)}}"></x-text-input>
                    @error('title')
                    <div class="text-sm mt-1 test-red-500">{{$message}}</div>
                    @enderror
                     <!-- Quill Editor -->
                    <div id="editor-container" class="w-full mt-6 bg-white dark:bg-gray-700 rounded border border-gray-300 dark:border-gray-600" style="height: 300px;"></div>
                    <textarea name="text" id="text-input" class="hidden" >{{@old('text', $note->text)}}</textarea>
                    @error('text')
                    <div class="text-sm mt-1 text-red-500">{{$message}}</div>
                    @enderror
                    <!-- <x-textarea name="text" placeholder="Type Your Note" rows="8" value="{{@old('text', $note->text)}}"
                                class="w-full mt-6"></x-textarea> -->
                    <!-- @error('text')
                    <div class="text-sm mt-1 text-red-500">{{$message}}</div>
                    @enderror -->
                    <select name="notebook_id" class="w-full mt-6 block font-medium text-sm text-gray-700 dark:text-gray-300">
                        <option value="" >Select A Notebook</option>
                        @foreach($notebooks as $notebook)
                            <option value="{{$notebook->id }}"
                            @if ($notebook->id === $note->notebook_id)
                                selected
                            @endif
                            >{{$notebook->name}}</option>
                        @endforeach

                    </select>
                    <x-primary-button id="save" class="mt-6">Save Note</x-primary-button>
                </form>
            </div>

        </div>
    </div>
    <!-- <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-xl">
                <form action="{{route('notes.store')}}" method="post" >
                    @csrf
                    <x-text-input name="title" class="w-full" placeholder="Note title" value="{{@old('title')}}"></x-text-input>
                    @error('title')
                    <div class="text-sm mt-1 text-red-500">{{$message}}</div>
                    @enderror
                    
                   
                    <select name="notebook_id" class="w-full mt-6 block font-medium text-sm text-gray-700 dark:text-gray-300">
                        <option value="">Select A Notebook</option>
                        @foreach($notebooks as $notebook)
                            <option value="{{$notebook->id }}">{{$notebook->name}}</option>
                        @endforeach

                    </select>

                    <x-primary-button class="mt-6" >Save Note</x-primary-button>
                </form>
            </div>

        </div> -->
    </div>
                    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        let textInput = null;
        let quill = null;
        
        document.addEventListener('DOMContentLoaded', function() {
            textInput = document.getElementById('text-input');
            const form = document.getElementById('save');
            
            quill = new Quill('#editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{ 'header': 1 }, { 'header': 2 }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['link', 'image'],
                        [{ 'align': [] }],
                        ['clean']
                    ]
                },
                placeholder: 'Type Your Note'
            
            });
            console.log(textInput.value);

            // Set initial content if there's old data
            if (textInput.value && textInput.value.trim()) {
                quill.root.innerHTML = textInput.value;
            }

            // Update the hidden textarea before form submission
            form.addEventListener('click', function(e) {
                // Get the content from Quill editor
                const content = quill.root.innerHTML;
                console.log('Quill content:', content);
                
                // Set the textarea value with the content
                textInput.value = content;
                console.log('Text input value set to:', textInput.value);
            });
        });
    </script>



</x-app-layout>
