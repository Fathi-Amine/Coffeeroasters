<x-layout>
    <div class="flex flex-col justify-around items-center gap-1 p-2">
        <x-signupcard class="w-full md:w-1/2">
            <form method="POST" action="/users/{{ $user->user_id }}">
                @csrf
                @method('PUT')
                <h2 class="text-blue-700 text-3xl font-semibold my-4">Edit</h2>
                <div class="flex flex-row gap-1">
                    <div class="w-1/2">
                        <label for="first_name" class="text-sm">First Name</label>
                        <input type="text" name="first_name" id="" class="h-8 w-full rounded-md border border-slate-300 text-sm pl-2 bg-transparent outline-blue-600 shadow-sm"  value="{{$user->first_name}}">
                        @error('first_name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="last_name" class="text-sm">Last Name</label>
                        <input type="text" name="last_name" id="" class="h-8 w-full rounded-md border border-slate-300 text-sm pl-2 bg-transparent outline-blue-600 shadow-sm" value="{{ $user->last_name }}">
                        @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <!-- email -->
                <div>
                    <label for="email" class="text-sm">Email</label><br>
                    <input type="email" name="email" id="email" class="h-8 w-full rounded-md border border-slate-300 text-sm pl-2 bg-transparent outline-blue-600 shadow-sm" value="{{ $user->email }}">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
    
                <button type="submit" name="" id="signUp" class="bg-blue-700 w-full h-10 cursor-pointer text-white rounded-md hover:bg-blue-600 hover:outline outline-2 outline-blue-600 outline-offset-2 text-sm mt-2">Update</button>
            </form>
        </x-signupcard>
        <x-signupcard class="h-auto w-full md:w-1/2">
            <form method="POST" action="/reset_password" >
                @csrf
                @method('PUT')
                <h2 class="text-blue-700 text-3xl font-semibold my-4">Change Password</h2>
                <div>
                    <label for="password" class="text-sm">Current Password</label><br>
                    <input type="password" name="old_password" id="password" class="h-8 w-full rounded-md border border-slate-300 text-sm pl-2 bg-transparent outline-blue-600 shadow-sm">
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="text-sm">New Password</label><br>
                    <input type="password" name="new_password" id="new_password" class="h-8 w-full rounded-md border border-slate-300 text-sm pl-2 bg-transparent outline-blue-600 shadow-sm">
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="text-sm">Confirm New Password</label><br>
                    <input type="password" name="new_password_confirmation" id="password" class="h-8 w-full rounded-md border border-slate-300 text-sm pl-2 bg-transparent outline-blue-600 shadow-sm">
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" name="" id="signUp" class="bg-blue-700 w-full h-10 cursor-pointer text-white rounded-md hover:bg-blue-600 hover:outline outline-2 outline-blue-600 outline-offset-2 text-sm mt-2">Reset</button>
            </form>
        </x-signupcard>
    </div>
</x-layout>

