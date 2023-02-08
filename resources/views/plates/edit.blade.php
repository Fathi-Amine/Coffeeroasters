<x-layout>
    <div class="w-1/2 bg-slate-100 my-0 mx-auto p-4">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Add a plate</h2>
            <p class="mb-4">Create a new plate on the menu</p>
          </header>
      
          <form method="POST" action="/plates/{{$plate->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
              <label for="title" class="inline-block text-lg mb-2">Title</label>
              <input placeholder='Name of the plate'type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                value="{{$plate->title}}" />
      
              @error('title')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>

            <div class="mb-6">
                <label for="img" class="inline-block text-lg mb-2">
                    Plate Photo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="img" />
                <img class="w-48 mr-6 mb-6"
                 src="{{$plate->img ? asset('storage/' . $plate->img) : asset('/images/image-commitment.jpg')}}" alt="" />
        
                @error('img')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
      
            <div class="mb-6">
              <label for="category" class="inline-block text-lg mb-2">
                Category
              </label>
              <input type="text" class="border border-gray-200 rounded p-2 w-full" name="category"
                placeholder="Example: Espresso, Late" value="{{$plate->category}}" />
      
              @error('category')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
      
            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">
                    Price
                </label>
                <input type="number" step="0.1"class="border border-gray-200 rounded p-2 w-full" name="price"
                    placeholder="Plate price" value="{{$plate->price}}" />
        
                @error('category')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
      
            <div class="mb-6">
              <label for="description" class="inline-block text-lg mb-2">
                Plate Description
              </label>
              <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                placeholder="Include ingredients, niche, etc">{{$plate->description}}</textarea>
      
              @error('description')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
      
            <div class="mb-6">
              <button class="bg-slate-300 rounded py-2 px-4 hover:bg-black hover:text-white">
                Update Plate
              </button>
      
              <a href="/" class="text-black ml-4"> Back </a>
            </div>
          </form>
        </div>
</x-layout>