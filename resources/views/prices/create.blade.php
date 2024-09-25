<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('prices.store') }}" method="post">
                    @csrf
                    <x-text-input type="text" name="title" field="title" placeholder="Title" class="w-full"
                        autocomplete="off" :value="@old('title')"></x-text-input>

                    <x-text-input type="number" name="cost" field="cost" placeholder="Cost" class="w-full mt-2"
                        autocomplete="off" :value="@old('cost')"></x-text-input>

                    <x-textarea name="description" rows="10" field="description" placeholder="Start typing here..."
                        class="w-full mt-6" :value="@old('description')"></x-textarea>

                    <x-submit-button class="mt-6">Save Item</x-submit-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
