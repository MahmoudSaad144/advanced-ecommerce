<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productFormModalLong">
    <i class="fa fa-plus"></i>
    {{ __("New") }}
</button>

<!-- Modal -->
<div class="modal fade" id="productFormModalLong" tabindex="-1" role="dialog"
    aria-labelledby="productFormModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productFormModalLongTitle">{{ __("Product form") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">{{ __("Submit") }}</button>
            </div>
        </div>
    </div>
</div>
