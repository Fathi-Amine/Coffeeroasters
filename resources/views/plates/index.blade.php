<x-layout>


<div class="grid lg:grid-cols-2 md:grid-cols-2 items-center justify-center gap-5 space-y-4 md:space-y-0 mx-4">

    @unless(count($plates) == 0)

    @foreach($plates as $plate)
    <x-plate :plate="$plate" />
    @endforeach

    @else
    <p>No listings found</p>
    @endunless

  </div>
</x-layout>