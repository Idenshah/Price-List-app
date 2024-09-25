<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Welcome to Price List</h3>
                    <p class="mb-2">Manage and organize your items with ease using the Price List app provided by Laravel.</p>
                    <ul class="list-disc list-inside mb-4">
                        <li><strong>Prices:</strong> Add new items by clicking the "New Item" button. You can enter the item’s title, cost, and description.</li>
                        <li><strong>Edit or Trash:</strong> Click on an item’s title to edit its details or move it to the trash.</li>
                        <li><strong>Trash Section:</strong> Items in the trash can be retrieved or deleted permanently.</li>
                    </ul>
                    <p class="text-sm text-gray-600">You're logged in!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>