@section('title', 'LIB-MS - Edit Book')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
        <form wire:submit.prevent="submit">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input wire:model="title" id="title" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                    <input wire:model="author" id="author" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('author') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                    <input wire:model="genre" id="genre" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('genre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="shelf_code" class="block text-sm font-medium text-gray-700">Shelf Code</label>
                    <input wire:model="shelf_code" id="shelf_code" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('shelf_code') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="published_date" class="block text-sm font-medium text-gray-700">Published Date</label>
                    <input wire:model="published_date" id="published_date" type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('published_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="copies_available" class="block text-sm font-medium text-gray-700">Copies Available</label>
                    <input wire:model="copies_available" id="copies_available" type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('copies_available') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-6 text-right">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Save Changes
                </button>
            </div>
        </form>

        @if (session()->has('message'))
            <div class="mt-4 text-green-600">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mt-4 text-red-600">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>