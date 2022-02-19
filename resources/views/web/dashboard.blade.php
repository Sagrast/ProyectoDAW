<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat mollitia expedita impedit sequi asperiores pariatur, modi libero, perspiciatis similique voluptatem maiores est nesciunt culpa voluptates illo enim obcaecati commodi fugit?</p>
                <p>Quos quis maxime saepe autem nihil! Architecto inventore totam doloremque eos aliquam, corrupti eligendi voluptas, nihil harum, officiis dolor soluta officia rem nemo. Distinctio necessitatibus suscipit veniam, tempore quis rem.</p>
                <p>Earum aperiam accusantium, facere dicta cumque deleniti aliquam quibusdam mollitia minus, obcaecati necessitatibus eos alias explicabo adipisci ducimus. Itaque inventore maxime excepturi harum veritatis consequatur eaque molestias dolor unde sit?</p>
                <p>Placeat ratione in ad laboriosam omnis atque nihil repellat ullam accusamus cupiditate quas esse, nemo perspiciatis unde quod alias totam at doloribus. Impedit laudantium cum ad dolore perspiciatis! Quibusdam, modi.</p>
                <p>Excepturi cumque quia sed. Maiores asperiores vel, labore obcaecati veritatis soluta, harum distinctio non debitis facilis quas quod nesciunt fugiat dolorem voluptatum nisi qui rerum omnis quo quasi, ratione at?</p>
            </div>
        </div>
    </div>
    @if (session('status'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">{{session('status')}}</p>
          </div>
        </div>
      </div>
@endif
</x-app-layout>
