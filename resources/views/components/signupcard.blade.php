<div {{ $attributes->merge(['class'=>'flex justify-center items-center h-screen']) }}>
    <div class="block bg-slate-100 p-6 rounded-xl shodow-md shadow-slate-300 w-full">
        {{$slot}}
    </div>
  </div>