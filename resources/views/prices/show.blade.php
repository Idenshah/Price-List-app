<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !$price->Trashed() ? __('Prices') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-session>{{ session('success') }}</x-alert-session>
            <div class="flex">
                @if (!$price->trashed())
                    <p class="opacity-70">
                        <strong>Created: </strong> {{ $price->created_at->diffForHumans() }}
                    </p>
                    <p class="opacity-70 ml-8">
                        <strong>Updated: </strong> {{ $price->updated_at->diffForHumans() }}
                    </p>
                    <a href="{{ route('prices.edit', $price) }}" class=" ml-auto "><x-primary-button
                            class='bg-yellow-600 text-white'>Edit Item</x-primary-button></a>
                    <form action="{{ route('prices.destroy', $price) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-danger-button type="submit" class="ml-4"
                            onclick="return confirm('Are you sure to move this item to trash?')">Trash</x-danger-button>
                    </form>
                @else
                    <p class="opacity-70">
                        <strong>Deleted: </strong> {{ $price->deleted_at->diffForHumans() }}
                    </p>
                    <form action="{{ route('trashed.update', $price) }}" method="post" class="ml-auto">
                        @method('put')
                        @csrf
                        <x-primary-button class='bg-yellow-600 text-white'>Restore Item</x-primary-button>
                    </form>

                     <form action="{{ route('trashed.destroy', $price) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-danger-button type="submit" class="ml-4"
                            onclick="return confirm('Are you sure to delete this item?')">Delete</x-danger-button>
                    </form>
                @endif
            </div>

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl"> {{ $price->title }}</h2>
                <p class="mt-2"> {{ $price->cost }}</p>
                <p class="mt-2 whitespace-pre-wrap"> {{ $price->description }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
