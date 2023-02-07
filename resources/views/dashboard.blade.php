<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    @if (session()->has('status'))
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3 mt-3" role="alert" id="status"> {{ session('status') }} </div>
    <script>
    setTimeout(function() {
      document.getElementById("status").style.display = "none";
    }, 3000);
    </script>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("All Post Data") }}
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                {{-- <div class="px-6 py-4 bg-gray-200"> --}}
                                  
                                </div>
                                @foreach ($posts as $post)
    @if ($post->user_id == Auth::user()->id)
        {{-- <div class="font-bold text-xl  mb-2">User Name: {{$post->user->name}}</div> --}}
        <div class="px-6 py-4 border-b border-gray-400">
            <div class="font-bold text-xl mb-2">Title: {{ $post->title }}</div>
            <p class="text-gray-700 text-base">
              {{ $post->body }}
            </p>
            <div class="flex justify-between">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{ url('/post/edit', $post->id) }}'">Edit</button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{ url('/post/delete', $post->id) }}'">Delete</button>
            </div>
        </div>
    @endif
@endforeach
                              </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
