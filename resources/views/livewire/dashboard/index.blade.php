<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Card: Total Books -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Total Books</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalBooks ?? 0 }}</p>
        </div>

        <!-- Card: Total Borrowers -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Total Borrowers</h3>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalBorrowers ?? 0 }}</p>
        </div>

        <!-- Card: Loans -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Active Loans</h3>
            <p class="text-3xl font-bold text-red-600 mt-2">{{ $activeLoans ?? 0 }}</p>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('books.index') }}" class="block bg-blue-500 text-white p-4 rounded-lg shadow-md text-center hover:bg-blue-600">
            <h4 class="text-lg font-semibold">Manage Books</h4>
        </a>
        <a href="{{ route('borrowers.index') }}" class="block bg-green-500 text-white p-4 rounded-lg shadow-md text-center hover:bg-green-600">
            <h4 class="text-lg font-semibold">Manage Borrowers</h4>
        </a>
        <a href="{{ route('loans.index') }}" class="block bg-red-500 text-white p-4 rounded-lg shadow-md text-center hover:bg-red-600">
            <h4 class="text-lg font-semibold">View Loans</h4>
        </a>
    </div>
</div>