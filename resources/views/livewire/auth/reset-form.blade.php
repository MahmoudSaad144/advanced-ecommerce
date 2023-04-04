<div>
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    @if (Session::get('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
@endif
    <form class="card card-md" wire:submit.prevent="ResetHandeler()" method="POST" >
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Rest Password</h2>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter Email" id="" wire:model.lazy="email" disabled>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" placeholder="Enter New Password" id="" wire:model.lazy="newpassword">
            @error('newpassword')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
            <div class="mb-2">
            <label class="form-label">
                Confirm Password
            </label>
            <div class="input-group input-group-flat">
                <input type="password" class="form-control"  placeholder="Confirm New Password" wire:model.debounce:1000ms="confirmpassword" >
            </div>
            @error('confirmpassword')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
            </div>
        </div>
    </form>

</div>
