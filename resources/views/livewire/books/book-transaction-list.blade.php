@section('title', 'LIB-MS - Book Transaction')
<div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Transaction List') }}
        </h2>
    </x-slot>

    @if($transactions->isEmpty())
        <div class="text-center py-6 px-8 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-lg shadow-md mt-6">
            <p class="text-lg font-semibold">No transactions found.</p>
            <p class="mt-2 text-sm">It looks like there are no transactions yet.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($transactions as $transaction)
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Transaction #{{ $transaction->id }}</h3>
                    <p class="mt-2 text-gray-600">Loan ID: {{ $transaction->loan_id }}</p>
                    <p class="mt-2 text-gray-600">Type: {{ ucfirst($transaction->transaction_type) }}</p>
                    <p class="mt-2 text-gray-600">Amount: ${{ number_format($transaction->amount, 2) }}</p>
                    <p class="mt-2 text-gray-600">Date: {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('M d, Y') }}</p>
                    <div class="mt-4 flex justify-between">
                        <!-- Trigger Delete Modal -->
                        <button wire:click="triggerDelete({{ $transaction->id }})" class="text-red-600 hover:text-red-800">
                            Delete
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Modal -->
<div x-data="{ open: false }" x-show="open" @keydown.escape.window="open = false" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
    <div class="bg-white rounded-lg p-8 max-w-sm w-full">
        <h2 class="text-xl font-semibold text-gray-800">Are you sure you want to delete this transaction?</h2>
        <div class="mt-4 flex justify-between">
            <!-- Cancel Button -->
            <button @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</button>
            <!-- Confirm Delete Button -->
            <button wire:click="deleteTransaction" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</button>
            </div>
        </div>
    </div>
</diV>
<script>
    window.addEventListener('trigger-delete', event => {
        // Trigger the modal to open and pass the transactionId
        document.querySelector('[x-data]').__x.$data.open = true;
        window.Livewire.emit('setTransactionId', event.detail.transactionId);
    });

    window.addEventListener('close-delete-modal', () => {
        // Close the modal when deletion is confirmed or canceled
        document.querySelector('[x-data]').__x.$data.open = false;
    });
</script>