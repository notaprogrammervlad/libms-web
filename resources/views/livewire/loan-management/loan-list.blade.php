@section('title', 'LIB-MS - Loan Management')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Loan List') }}
        </h2>
    </x-slot>

    <!-- Action Buttons -->
    <div class="mx-auto my-10 text-center space-x-4">
        <a href="{{ route('loans.add') }}" class="inline-block bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">
            Loan a book
        </a>
        <a href="{{ route('returned.loans') }}" class="inline-block bg-red-500 text-white px-6 py-3 rounded-md hover:bg-red-600 transition duration-200">
            Show Returned Loans
        </a>
        <a href="{{ route('books.transactions') }}" class="inline-block bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200">
            Book Transactions
        </a>
    </div>

    @if($loans->isEmpty())
        <div class="text-center py-6 px-8 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-lg shadow-md mt-6">
            <p class="text-lg font-semibold">No loans found.</p>
            <p class="mt-2 text-sm">It looks like there are no loans yet.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($loans as $loan)
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Loan #{{ $loan->id }}</h3>
                    <p class="mt-2 text-gray-600">Book: {{ $loan->book->title }}</p>
                    <p class="mt-2 text-gray-600">Borrower: {{ $loan->borrower->first_name }} {{ $loan->borrower->last_name }}</p>
                    <p class="mt-2 text-gray-600">Loan Date: {{ \Carbon\Carbon::parse($loan->loan_date)->format('M d, Y') }}</p>
                    <p class="mt-2 text-gray-600">Due Date: {{ \Carbon\Carbon::parse($loan->due_date)->format('M d, Y') }}</p>
                    <p class="mt-2 text-gray-600">Status: {{ ucfirst($loan->status) }}</p>
                    
                    <!-- Return Book Button -->
                    @if($loan->status != 'Returned')
                        <button wire:click="returnBook({{ $loan->id }})" class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-200">
                            Return Book
                        </button>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
