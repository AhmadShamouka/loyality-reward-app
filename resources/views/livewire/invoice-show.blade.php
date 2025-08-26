<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Invoice Preview</h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow rounded" x-data>
        <div class="flex justify-between mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Invoice #{{ $invoice->invoice_no }}</h2>
            <button onclick="window.print()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Print</button>
        </div>

        <div>
            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M Y') }}</p>
            <p><strong>Amount:</strong> ${{ number_format($invoice->amount, 2) }}</p>
            <p><strong>QR Code:</strong></p>
            <div class="mt-2">
                {!! QrCode::size(120)->generate($invoice->qr_token) !!}
            </div>
            
        </div>
    </div>
</x-app-layout>
