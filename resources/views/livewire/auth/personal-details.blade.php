<div>
    <form  wire:submit.prevent="PersonalHandeler" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control"  placeholder="Name" wire:model.lazy="name">
                </div>
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Username" wire:model.lazy="username">
                </div>
                @error('username')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Email" wire:model.lazy="email" disabled>
                </div>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Biography</label>
                <textarea class="form-control" rows="6" placeholder="Content.." wire:model.lazy="biography">Biography</textarea>
            </div>
            @error('biography')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
