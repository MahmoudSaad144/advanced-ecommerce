<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-3">
                <h2>{{__("All Products")}}:</h2>
            </div>
        </div>
        <div class="row">
            <div class="d-flex p-1 w-100 justify-content-between">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">{{__("All")}}</button>
                    {{-- <div class="dropdown-menu">
                        <a class="dropdown-item" style="cursor: pointer">{{__("All")}}</a>
                        <a class="dropdown-item" style="cursor: pointer" >{{__("Accepted")}}</a>
                        <a class="dropdown-item" style="cursor: pointer">{{__("Pending")}}</a>
                        <a class="dropdown-item" style="cursor: pointer">{{__("Canceled")}}</a>
                    </div> --}}
                </div>
                <div>
                    <input class="form-control mr-sm-2" wire:model="search" type="search" placeholder="Search" aria-label="Search">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-dark ">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">{{__("Name")}}</th>
                        <th scope="col">{{__("Category")}}</th>
                        <th scope="col">{{__("CreatedAt")}}</th>
                        <th scope="col">{{__("Owner")}}</th>
                        <th scope="col">{{__("Active")}}</th>
                        <th scope="col">{{__("Action")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->getcategory->category_name}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>{{$product->getvendor->name}}</td>
                            <td>
                                <div wire:click="active('{{$product->id}}','{{$product->active}}')">
                                    ​<label class="switch" >
                                        <input type="checkbox" @checked($product->active) >
                                        <span class="slider round" ></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="btn btn-success">{{__("Edit")}}</a>
                                <a href="#" class="btn btn-danger">{{__("Delete")}}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class=" text-center paginate">{{ $products->links('livewire::bootstrap') }}</div>
        </div>
</div>

</div>
