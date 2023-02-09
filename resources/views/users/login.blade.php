<x-layout>
    <x-signupcard>
        <form method="POST" action="/authenticate">
            @csrf
            <h2 class="text-blue-700 text-3xl font-semibold my-4">Login</h2>
            <!-- email -->
            <div>
                <label for="email" class="text-sm">Email</label><br>
                <input type="email" name="email" id="email" class="h-8 w-full rounded-md border border-slate-300 text-sm pl-2 bg-transparent outline-blue-600 shadow-sm">
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <!-- password -->
            <div>
                <label for="password" class="text-sm">Password</label><br>
                <input type="password" name="password" id="password" class="h-8 w-full rounded-md border border-slate-300 text-sm pl-2 bg-transparent outline-blue-600 shadow-sm">
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <a class="block underline text-blue-600 mt-4" href="/password">Forgot Password</a>
            <button type="submit" name="" id="login" class="bg-blue-700 w-full h-10 cursor-pointer text-white rounded-md hover:bg-blue-600 hover:outline outline-2 outline-blue-600 outline-offset-2 text-sm mt-2">Login</button>
        </form>
    </x-signupcard>
</x-layout>