@section('title', 'LIB-MS - Borrower List')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Borrower List') }}
        </h2>
    </x-slot>

    <!-- Add Borrower Button -->
    <div class="mx-auto my-10 text-center">
        <a href="{{ route('borrowers.add') }}" class="inline-block bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">
            Add Borrower
        </a>
    </div>

    @if($borrowers->isEmpty())
        <!-- Message when there are no borrowers -->
        <div class="text-center py-6 px-8 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-lg shadow-md mt-6">
            <p class="text-lg font-semibold">No borrowers found.</p>
            <p class="mt-2 text-sm">It looks like there are no borrowers added yet. Add borrowers now!</p>
        </div>
    @else
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($borrowers as $borrower)
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $borrower->first_name }} {{ $borrower->last_name }}</h3>
                    <p class="mt-2 text-gray-600">Email: {{ $borrower->email }}</p>
                    <p class="mt-2 text-gray-600">Membership Type: {{ $borrower->membership_type }}</p>
                    <p class="mt-2 text-gray-600">Date Joined: {{ \Carbon\Carbon::parse($borrower->date_joined)->format('M d, Y') }}</p>

                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('borrowers.edit', ['borrowerId' => $borrower->id]) }}" class="text-blue-600 hover:text-blue-800">Edit</a>

                        <!-- Delete Button with Modal -->
                        <button type="button" wire:click="confirmDelete({{ $borrower->id }})" class="text-red-600 hover:text-red-800">
                            Delete
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Delete Confirmation Modal -->
    @if($confirmingDelete)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h3 class="text-lg font-semibold text-gray-800">Are you sure you want to delete this borrower?</h3>
                <div class="mt-4 flex justify-end">
                    <button wire:click="destroy" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Yes, Delete</button>
                    <button wire:click="$set('confirmingDelete', false)" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    @endif
</div>