<div class="max-w-6xl mx-auto p-6 bg-white rounded shadow">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
        <h2 class="text-2xl font-bold text-gray-800">My Invoices</h2>

        <div class="flex items-center gap-2">
            <input
                type="text"
                wire:model.debounce.400ms="search"
                placeholder="Search by invoice no, amount, or YYYY-MM-DD"
                class="border rounded px-3 py-2 w-64"
            />
        </div>
    </div>

    <div wire:loading.class="opacity-50">
        @if($invoices->count())
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr class="text-center">
                        
                            <th class="px-4 py-2 border">Invoice No</th>
                            <th class="px-4 py-2 border">Amount</th>
                            <th class="px-4 py-2 border">Date</th>
                            <th class="px-4 py-2 border">QR Code</th>
                            <th class="px-4 py-2 border">Show</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                            <tr class="text-center hover:bg-gray-50">
                            
                                <td class="border px-4 py-2">{{ $invoice->invoice_no }}</td>
                                <td class="border px-4 py-2">${{ number_format($invoice->amount, 2) }}</td>
                                <td class="border px-4 py-2">
                                    {{$invoice->invoice_date}}
                                </td>
                                <td class="border px-4 py-2">
                                    <img src="{{ url('/generate-qr?token=' . $invoice->qr_token) }}"
                                         class="mx-auto w-20" alt="QR">
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ url('/invoices/' . $invoice->id) }}"
                                       class="text-blue-600 hover:underline">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500">No invoices found.</p>
        @endif
    </div>

</div>
