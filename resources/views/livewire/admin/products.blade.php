<div>

        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-3">
                <h2>{{ __('All Products') }}:</h2>
            </div>
        </div>
        <div class="row">
            <div class="d-flex p-1 w-100 justify-content-between">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLg" >{{ __("Add Product") }}</button>
                {{-- <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-expanded="false">{{ __('All') }}</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" style="cursor: pointer">{{__("All")}}</a>
                        <a class="dropdown-item" style="cursor: pointer" >{{__("Accepted")}}</a>
                        <a class="dropdown-item" style="cursor: pointer">{{__("Pending")}}</a>
                        <a class="dropdown-item" style="cursor: pointer">{{__("Canceled")}}</a>
                    </div>
                </div> --}}
                <div>
                    <input class="form-control m-2 mr-sm-2" wire:model="search" type="search" placeholder="Search"
                        aria-label="Search">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-dark ">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Category') }}</th>
                            <th scope="col">{{ __('CreatedAt') }}</th>
                            <th scope="col">{{ __('Owner') }}</th>
                            <th scope="col">{{ __('Active') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->getcategory->category_name }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->getvendor->name }}</td>
                                <td>
                                    <div wire:click="active('{{ $product->id }}','{{ $product->active }}')">
                                        ​<label class="switch">
                                            <input type="checkbox" @checked($product->active)>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-success">{{ __('Edit') }}</a>
                                    <a href="#" class="btn btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class=" text-center paginate">{{ $products->links('livewire::bootstrap') }}</div>
        </div>

    </div>

    <div class="modal fade" wire:ignore.self id="exampleModalLg" aria-labelledby="exampleModalLgLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">{{__("AddNewProduct")}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="StoreProductHandler()" method="POST" enctype="multipart/form-data">

                    <div>
                        <input  class="form-control m-2" placeholder="{{ __("Product name") }}" wire:model.lazy="product_name" type="text">
                        @error("product_name")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <textarea  class="form-control m-2" placeholder="{{ __("Product description") }}" wire:model.lazy="product_desc" id="" cols="30" rows="5"></textarea>
                        @error("product_desc")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>

                    <div>
                        <input class="form-control m-2" placeholder="{{ __("Product price") }}" wire:model.lazy="product_price" type="number">
                        @error("product_price")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <input class="form-control m-2" placeholder="{{ __("number of products in stock") }}" wire:model.lazy="product_sku" type="number">
                        @error("product_sku")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    {{ $product_sku }}

                    <div>
                        <input class="form-control m-2" placeholder="{{ __("Product images") }}" wire:model.lazy="product_images" type="file" multiple>
                        <div wire:loading wire:target="product_images">{{__("Loading...")}}
                            <div class="spinner-border text-dark" role="status">
                                <span class="sr-only">{{__("Loading...")}}</span>
                            </div>
                        </div>
                        @error("product_images")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <select wire:model="categoryid" class="select" style="width: 50%">
                        <option value="Java">Java</option>
                        <option value="Javascript">Javascript</option>
                        <option value="PHP">PHP</option>
                        <option value="Visual Basic">Visual Basic</option>
                        <option value="Visual">Visual Basic</option>
                    </select>
                    {{ $categoryid }}
                    <input class="form-control m-2" placeholder="{{ __("Product discount") }}" wire:model.lazy="product_discount" type="number">
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{ __("Add") }}</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>
