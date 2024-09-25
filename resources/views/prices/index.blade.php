<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('prices.index') ? __('Prices') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-session>{{ session('success') }}</x-alert-session>

            @if (request()->routeIs('prices.index'))
                <a href="{{ route('prices.create') }}"><x-primary-button>+ New Items </x-primary-button></a>
            @endif

            @forelse ($prices as $price)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                    <h2 class="font-bold text-2xl"> <a 
                        @if (request()->routeIs('prices.index'))
                        href="{{ route('prices.show', $price) }}"
                        @else
                        href="{{ route('trashed.show', $price) }}"
                        @endif
                        >{{ $price->title }}</h2>
                    <p class="mt-2"> {{ $price->cost }}</p>
                    <p class="mt-2"> {{ Str::limit($price->description, 100) }}</p>
                    <span class="block mt-4 text-sm opacity-70">{{ $price->updated_at->diffForHumans() }}</span>
                </div>
            @empty
                @if (request()->routeIs('prices.index'))
                    <p>You have no Items yet!</p>
                @else
                    <p>You have no Items in trash bin!</p>
                @endif
            @endforelse
            {{ $prices->links() }}
        </div>
    </div>
</x-app-layout>
