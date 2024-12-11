@section('title', 'LIB-MS - Edit Borrower')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Borrower') }}
        </h2>
    </x-slot>

    <form wire:submit.prevent="updateBorrower">
        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-semibold text-gray-700">First Name</label>
                <input type="text" id="first_name" wire:model="first_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('first_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-sm font-semibold text-gray-700">Last Name</label>
                <input type="text" id="last_name" wire:model="last_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" id="email" wire:model="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="membership_type" class="block text-sm font-semibold text-gray-700">Membership Type</label>
                <select id="membership_type" wire:model="membership_type" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="Regular">Regular</option>
                    <option value="Premium">Premium</option>
                    <option value="Student">Student</option>
                    <option value="Senior">Senior</option>
                </select>
                @error('membership_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">
                Update Borrower
            </button>
        </div>
    </form>
</div>