<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Invoice;

class InvoiceShow extends Component
{
    public $invoice;

    public function mount($id)
    {
        $this->invoice = Invoice::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.invoice-show');
    }



}
