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
    <form class="card card-md" wire:submit.prevent="RegisterHandeler()" method="POST" >
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Register into {{env('APP_NAME')}}</h2>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" id="" wire:model.lazy="register_name" required>
                @error('register_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Enter UserName" id="" wire:model.lazy="register_username" required>
                @error('register_username')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" placeholder="Enter Email " id="" wire:model.lazy="register_email" required>
                @error('register_email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Password
                </label>
                <div class="input-group input-group-flat">
                    <input type="password" class="form-control"  placeholder="Password" wire:model.lazy="register_password" required>
                </div>
                @error('register_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label">
                    Confirm Password
                </label>
                <div class="input-group input-group-flat">
                    <input type="password" class="form-control"  placeholder="Confirm Password" wire:model.lazy="register_confirmpassword" required >
                </div>
                @error('register_confirmpassword')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign up</button>
            </div>
            <div class="text-center text-muted mt-3">
                Already have an account .. <a href="{{route('login')}}" tabindex="-1">Sign In</a>
                </div>
    </form>
</div>
