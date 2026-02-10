@if(session('success'))
    <p class="mb-4 px-4 py-2 bg-green-200 border border-green-300 text-green-700 rounded-md">
        {{session('success')}}
    </p>
@endif
