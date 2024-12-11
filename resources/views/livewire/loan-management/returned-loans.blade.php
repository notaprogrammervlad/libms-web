@section('title', 'LIB-MS - Returned Loans')
<div class="container mx-auto my-5 px-4">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Returned Loan List') }}
        </h2>
    </x-slot>
    @if($returnedLoans->isEmpty())
    <div class="text-center py-6 px-8 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-lg shadow-md mt-6">
        <p class="text-lg font-semibold">No returned loans found.</p>
        <p class="mt-2 text-sm">It looks like there are no returned loans yet.</p>
    </div>
    @else
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Book Title</th>
                        <th class="px-4 py-2 text-left">Borrower</th>
                        <th class="px-4 py-2 text-left">Loan Date</th>
                        <th class="px-4 py-2 text-left">Return Date</th>
                        <th class="px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($returnedLoans as $loan)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $loan->book->title }}</td>
                            <td class="px-4 py-2">{{ $loan->borrower->first_name }} {{ $loan->borrower->last_name }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($loan->loan_date)->format('Y-m-d') }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($loan->return_date)->format('Y-m-d') }}</td>
                            <td class="px-4 py-2 text-green-500 font-bold">{{ $loan->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>