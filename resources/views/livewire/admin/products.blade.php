@push("stylesheets")
<style>
    :root {
        --accent: #FFA500;
        --color1: linear-gradient(to bottom right, #FFA500, #FF5F1F);
        --transparent: rgb(255, 255, 255, 0.3);
    }

    .modal.form {
        width: 800px;
        height: max-content;
        background-color: var(--transparent);
        color: var(--accent);
        position: fixed;
        padding: 0;
        left: 50%;
        backdrop-filter: blur(10px);
        border: 2px solid var(--transparent);
        border-radius: 16px;
        text-align: center;
        top: 10%;
        transform: translate(-50%);
        overflow:auto;
        height:80%;
    }

    .form.modal .modal-dialog{
        padding:5px 15px
    }

    .modal.form input::placeholder, .modal.form textarea::placeholder {
        color: #fff;
    }
    .modal.form input,.modal.form textarea {
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 14px;
        margin: 10px 0;
        width: 100%;
        color:#fff !important;
        border: none;
        border-bottom: 1px solid var(--accent);
        background-color: transparent;
        outline: none;
    }

   .form.modal .modal-content{
        width: 100%;
        background: transparent;
        border: none;
    }
    .modal.form a {
        background: var(--color1);
        colrgb(134, 22, 22)EEEE;
        text-decoration: none;
        padding: 12px 0;
        margin: 20px 0 10px 0;
        text-align: center;
        border-radius: 30px;
        transition: 0.4s;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 20px;
    }

    .modal.form a:hover {
        transform: translatey(2px);
        box-shadow: none;
    }
</style>
@endpush

<div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productFormModalLong">
        <i class="fa fa-plus"></i>
        {{ __("New") }}
    </button>
    
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-3">
                <h2>{{ __('All Products') }}:</h2>
            </div>
        </div>
        <div class="row">
            <div class="d-flex p-1 w-100 justify-content-between">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-expanded="false">{{ __('All') }}</button>
                    {{-- <div class="dropdown-menu">
                        <a class="dropdown-item" style="cursor: pointer">{{__("All")}}</a>
                        <a class="dropdown-item" style="cursor: pointer" >{{__("Accepted")}}</a>
                        <a class="dropdown-item" style="cursor: pointer">{{__("Pending")}}</a>
                        <a class="dropdown-item" style="cursor: pointer">{{__("Canceled")}}</a>
                    </div> --}}
                </div>
                <div>
                    <input class="form-control mr-sm-2" wire:model="search" type="search" placeholder="Search"
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
    
    <div class="form modal fade" wire:ignore.self id="productFormModalLong" tabindex="-1" role="dialog"
        aria-labelledby="productFormModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <h2>Sign up</h2>

                <form wire:submit.prevent="StoreProductHandler()" method="POST" enctype="multipart/form-data">

                    <div>
                        <input placeholder="{{ __("Product name") }}" wire:model="product_name" type="text">
                        @error("product_name")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <textarea placeholder="{{ __("Product desc") }}" wire:model="product_desc" id="" cols="30" rows="5"></textarea>
                        @error("product_desc")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <input placeholder="{{ __("Product desc") }}" wire:model="product_desc" type="text">
                        @error("product_desc")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <input placeholder="{{ __("Product price") }}" wire:model="product_price" type="number">
                        @error("product_price")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <input placeholder="{{ __("Product sku") }}" wire:model="product_sku" type="number">
                        @error("product_sku")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
    
                    <div>
                        <input placeholder="{{ __("Product images") }}" wire:model="product_images" type="file" multiple>
                        <div wire:loading wire:target="product_images">جاري تحميل الصورة .......</div>
                        @error("product_images")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
    
                    <input type="text" placeholder="asdf" wire:model.debounce.500ms="categorySearch" id="">
                    <select wire:model="category_id" id="">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ __($category->category_name) }}</option>
                        @endforeach
                    </select>

                    <input placeholder="{{ __("Product discount") }}" wire:model="product_discount" type="number">

                    <button style="color:#555" class="btn btn-warning" tyoe="submit">{{ __("Submit") }}</button>

                </form>


            </div>
        </div>
    </div>

</div>
