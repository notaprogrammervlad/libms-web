@section('title', 'LIB-MS - Add Loan')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Loan') }}
        </h2>
    </x-slot>

    <form wire:submit.prevent="submit">
        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
            <div class="mb-4">
                <label for="book_id" class="block text-sm font-semibold text-gray-700">Book</label>
                <select id="book_id" wire:model="book_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Select a Book</option>
                    @forelse($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }} ({{ $book->copies_available }} available)</option>
                    @empty
                        <option value="" disabled>No books available</option>
                    @endforelse
                </select>
                @error('book_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="borrower_id" class="block text-sm font-semibold text-gray-700">Borrower</label>
                <select id="borrower_id" wire:model="borrower_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Select a Borrower</option>
                    @forelse($borrowers as $borrower)
                        <option value="{{ $borrower->id }}">{{ $borrower->first_name }} {{ $borrower->last_name }}</option>
                    @empty
                        <option value="" disabled>No borrowers available</option>
                    @endforelse
                </select>
                @error('borrower_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="loan_date" class="block text-sm font-semibold text-gray-700">Loan Date</label>
                <input type="date" id="loan_date" wire:model="loan_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('loan_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="due_date" class="block text-sm font-semibold text-gray-700">Due Date</label>
                <input type="date" id="due_date" wire:model="due_date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('due_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="transaction_fee" class="block text-sm font-semibold text-gray-700">Transaction Fee</label>
                <input type="number" step="0.01" id="transaction_fee" wire:model="transaction_fee" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ $transaction_fee }}">
                @error('transaction_fee') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">
                Add Loan
            </button>
        </div>
    </form>
</div>