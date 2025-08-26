<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoiceIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $listeners = ['invoiceAdded' => '$refresh'];
    protected $queryString = ['search']; // keep search in URL

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $invoices = Invoice::where('user_id', Auth::id())
            ->when($this->search, function ($q) {
                $s = trim($this->search);

                // You can adjust fields as needed
                $q->where(function ($q) use ($s) {
                    $q->where('invoice_no', 'like', "%{$s}%")
                      ->orWhere('amount', 'like', "%{$s}%")
                      ->orWhereDate('invoice_date', $s);
                });
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.invoice-index', compact('invoices'));
    }
}
