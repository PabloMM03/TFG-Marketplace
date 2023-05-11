<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductsIndex extends Component
{
    //Make pagination
    
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;

    //Reset page to search for products
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        //Get list of products according to account
        $products = Product::where('user_id', auth()->user()->id)
                            ->where('name', 'LIKE','%'.$this->search . '%')
                            ->latest('id')
                            ->paginate();
        return view('livewire.admin.products-index', compact('products'));
    }
}
