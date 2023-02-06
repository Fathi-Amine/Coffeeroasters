<x-layout>
    <x-signupcard>
        <form method="POST" action="/users">
            @csrf
            <h2 class="text-blue-700 text-3xl font-semibold my-4">Register</h2>
            <div class="flex flex-row gap-1">
                <div class="w-1/2">
                    <label for="first_name" class="text-sm">First Name</label>
                    <input type="text" name="first_name" id="" class="h-8 w-full rounded-md border border-slate-300 text-sm pl-2 bg-transparent outline-blue-600 shadow-sm">
                    @error('first_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="last_name" class="text-sm">Last Name</label>
                    <input type="text" name="last_name" id="" class="h-8 w-full rounded-md border border-slate-300 text-sm pl-2 bg-transparent outline-blue-600 shadow-sm">
                    @error('last_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
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
            <!-- confirm password -->
            <div>
                <label for="confirmPassword" class="text-sm">Confirm Password</label><br>
                <input type="password" name="password_confirmation" id="confirmPassword" class="h-8 w-full rounded-md border border-slate-300 text-sm pl-2 bg-transparent outline-blue-600 shadow-sm">
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <!-- radio buttons for gender -->
            <!-- Sign up / submit button -->
            <button type="submit" name="" id="signUp" class="bg-blue-700 w-full h-10 cursor-pointer text-white rounded-md hover:bg-blue-600 hover:outline outline-2 outline-blue-600 outline-offset-2 text-sm mt-2">Register</button>
            <p class="text-xs my-2">Already have a account? <a href="#" class="text-blue-600">Login</a></p>
        </form>
    </x-signupcard>
</x-layout>