<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class InvoiceCreate extends Component
{
    public $amount;
    public $invoice_date;

    protected $rules = [
        'amount' => 'required|numeric|min:0',
        'invoice_date' => 'required|date',
    ];

    public function submit()
    {
   
        $this->validate();
     
        $invoiceNo = $this->generateInvoiceNo();
       
        Invoice::create([
            'user_id' => Auth::id(),
            'invoice_no' => $invoiceNo,
            'amount' => $this->amount,
            'invoice_date' => $this->invoice_date,
            'qr_token' => Str::uuid(),
        ]);
        
        session()->flash('success', 'Invoice created successfully!');
        $this->reset(['amount', 'invoice_date']);
        $this->dispatch('invoiceAdded');

    }

    private function generateInvoiceNo()
    {
        // Example: INV-2025-00001
        $prefix = 'INV-' . date('Y') . '-';
        $lastInvoice = Invoice::orderBy('id', 'desc')->first();
        $lastNumber = $lastInvoice ? intval(substr($lastInvoice->invoice_no, -5)) : 0;
        $nextNumber = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

        return $prefix . $nextNumber;
    }

    public function render()
    {
        return view('livewire.invoice-create');
    }
}

