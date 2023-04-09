<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $search;

    public function updated($propertyName)
    {
        $this->gotoPage(1);
    }

    public function active($id,$active){

        $product = Product::findOrFail($id);

        if ($active == 0) {
            $active = 1;
        }elseif($active == 1) {
            $active = 0;
        }
        $updated=$product->update([
            'active' => $active,
        ]);


        if ($updated) {
            $this->showToastr(__("Your change has been successfuly updated."),'success');
        }else {
            $this->showToastr(__('Something went wrong.'),'error');
        }

    }


    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }

    public function render()
    {
        $products = Product::search(trim($this->search))->orderBy('created_at', 'asc')->paginate(8);
        return view('livewire.admin.products',[
            'products'=>$products,
        ]);
    }
}
