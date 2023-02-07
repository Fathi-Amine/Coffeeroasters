<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body class="bg-[url({{asset('images/image-hero-coffeepress.jpg')}})] bg-no-repeat bg-cover bg-center">
  <nav class="p-5 bg-white shadow md:flex md:items-center md:justify-between">
    <div  class="flex justify-between items-center ">
        <a class="cursor-pointer">
            <img class="h-10 inline"
            src="{{asset('images/logo.svg')}}">
        </a>
        <span class="text-3xl cursor-pointer mx-2 md:hidden block">
            <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
        </span>
    </div>
    <ul class="md:flex md:items-center z-[0] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
        <li class="mx-4 my-6 md:my-0">
          <a href="#" class="text-xl hover:text-cyan-500 duration-500">HOME</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
          <a href="#" class="text-xl hover:text-cyan-500 duration-500">ABOUT</a>
        </li>
        @auth
        <li class="mx-4 my-6 md:my-0 ">
          <span class="font-bold uppercase">
           <a href="users/{{ auth()->user()->user_id }}/editprofile"> Welcome {{auth()->user()->first_name}} {{auth()->user()->last_name}}</a>
          </span>
        </li>
        <li>
          <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage Listings</a>
        </li>
        <li>
          <form class="inline" method="POST" action="/logout">
            @csrf
            <button type="submit">
              <i class="fa-solid fa-door-closed"></i> Logout
            </button>
          </form>
        </li>
        @else
        <a href="/register" class="bg-cyan-400 text-white font-[Poppins] duration-500 px-6 py-2 mx-4 hover:bg-cyan-500 rounded ">
          Get started
        </a>
        @endauth
    </ul>
  </nav>
  <main>
    {{$slot}}
  </main>
  <script>
    function Menu(e){
      let list = document.querySelector('ul');
      e.name === 'menu' ? (e.name = "close",list.classList.add('top-[80px]') , list.classList.add('opacity-100')) :( e.name = "menu" ,list.classList.remove('top-[80px]'),list.classList.remove('opacity-100'))
    }
  </script>
</body>
</html>