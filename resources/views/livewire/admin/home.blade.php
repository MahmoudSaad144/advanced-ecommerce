<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLg" >{{ __("Add Product") }}</button>

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
                <select class="select" style="width: 50%">
                    <option>Java</option>
                    <option>Javascript</option>
                    <option>PHP</option>
                    <option>Visual Basic</option>
                </select>
            
            </div>
        </div>
    </div>    
    
</div>
