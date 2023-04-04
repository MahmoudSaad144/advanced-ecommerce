<div>
    <form  wire:submit.prevent="ChangePasswordHandeler" method="post">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">Current Password</label>
                    <input type="password" class="form-control"  placeholder="Current Password" wire:model.lazy="old_Password">
                </div>
                @error('old_Password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control"  placeholder="New Password" wire:model.lazy="new_Pas">
                </div>
                @error('new_Pas')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control"  placeholder="Confirm Password" wire:model.lazy="confirm_Pas">
                </div>
                @error('confirm_Pas')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="text-center"><button type="submit" class="btn btn-primary">Save Changes</button></div>
    </form>
</div>
