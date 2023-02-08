@props(['plate'])

<x-platecard>
    <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{  asset('/images/image-commitment.jpg') }}')" title="Woman holding a mug">
    </div>
    <div class="lg:w-7/12 border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
      <div class="mb-8">
        <p class="text-sm text-gray-600 flex items-center">
          <div class="w-[20px]"><img src="{{ asset('/images/price.svg') }}" alt=""></div>
          {{ $plate->price}}
        </p>
        <div class="text-gray-900 font-bold text-xl mb-2">{{ $plate->title }}</div>
        <p class=" text-ellipsis overflow-hidden whitespace-nowrap text-gray-700 text-base">{{ $plate->description }}</p>
      </div>
        <div class="text-sm">
          <p class="text-gray-900 leading-none">{{ $plate->category }}</p>
        </div>
    </div>
</x-platecard>