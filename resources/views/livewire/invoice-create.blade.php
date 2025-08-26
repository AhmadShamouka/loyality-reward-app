<div class="max-w-md mx-auto p-6 bg-white rounded shadow">
    @if (session()->has('success'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label class="block mb-1 font-semibold">Amount</label>
            <input type="number" wire:model.defer="amount" step="0.01"
                   class="w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200" />
            @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 font-semibold">Invoice Date</label>
            <input type="date" wire:model.defer="invoice_date"
                   class="w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200" />
            @error('invoice_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Create Invoice
        </button>
     

    </form>
       @if ($errors->any())
            <div class="text-red-600 font-semibold">
                {{ implode(', ', $errors->all()) }}
            </div>
        @endif
</div>
