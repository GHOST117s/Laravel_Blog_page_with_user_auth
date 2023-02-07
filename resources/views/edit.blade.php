<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-black-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>
     @if (session()->has('status'))
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3 mt-3" role="alert"> {{ session('status') }}  </div>
    @endif

    <div class="container m-5">
        <form method="POST" class="w-full max-w-sm">
          @csrf
          @method('PUT')
          <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="flex items-center p-5">

              <div class="w-12 h-12 rounded-full overflow-hidden mr-5">
               <img class="rounded-full h-12 w-12 mx-auto" src="https://picsum.photos/200">
              </div>
              
            </div>
            <div class="p-5">
              <div class="mb-3">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input id="title" type="text" name="title" class="w-full border border-gray-400 p-2 rounded-lg" value="{{$post->title}}">
              </div>
              <div class="mb-3">
                <label for="body" class="block text-gray-700 font-medium mb-2">Body</label>
                <textarea id="body" name="body" rows="3" class="w-full border border-gray-400 p-2 rounded-lg" >{{$post->body}}</textarea>
              </div>
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
               Edit Post
              </button>
            </div>
          </div>
        </form>
        @if (session()->has('status'))
        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3 mt-3" role="alert" id="status"> {{ session('status') }} </div>
        <script>
        setTimeout(function() {
          document.getElementById("status").style.display = "none";
        }, 3000);
        </script>
        @endif
            
        
      </div>
      




  
</x-app-layout>
