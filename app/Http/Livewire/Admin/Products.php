<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination, WithFileUploads;

    public $search;

    public $product_name, $product_desc, $product_price, $product_sku, $product_discount, $categoryid, $categorySearch;

    public $product_images = [];

    public function mount() {
        $this->categories = Category::all();
    }

    public function updated($propertyName)
    {

        $this->gotoPage(1);
        // $this->categories = $this->categories->filter(function($item) {
        //     dd($item["category_name"], $this->categorySearch);
        //     return str_contains($item["category_name"], $this->categorySearch);
        // });

        // $this->categories = strlen($this->categorySearch) ? Category::all() : $this->categories;

        // dd($this->categories);

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
            $this->showToastr(__("Your change has been successfuly updated."), 'success');
        }else {
            $this->showToastr(__('Something went wrong.'),'error');
        }

    }

    public function StoreProductHandler() {

        $this->validate([
            "product_name"=>["required", "min:8", "max:255"],
            "product_desc"=>["required", "min:8", "max:65000"],
            "product_price"=>["required", "numeric", "digits_between:1,9"],
            "product_sku"=>["required", "numeric", "digits_between:1,9"],
            "product_images.*"=>["nullable", "file", "mimes:jpg,png,jpeg"],
            "product_discount"=>["nullable", "numeric"],
        ]);

        foreach($this->product_images as $index=>$image) {
            $this->product_images[$index] = $image->store("imgs/products");
        }

        $this->product_images = json_encode($this->product_images);

        Product::create([
            "product_name"=>trim($this->product_name),
            "product_desc"=>trim($this->product_desc),
            "product_price"=>trim($this->product_price),
            "product_sku"=>trim($this->product_sku),
            "product_images"=>trim($this->product_images),
            "product_discount"=>trim($this->product_discount),
            "vendorid"=>auth()->id(),
            "categoryid"=>$this->categoryid ?? 1,
        ]);

        // foreach($this->product_images as $iamge) {

        // }

    } // end of StoreProductHandler

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
            'categories'=>$this->categories,
        ]);
    }
}
