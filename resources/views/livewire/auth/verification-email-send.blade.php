
<div>
@php
if ($verification_done) {
    return redirect()->route('home');
}
@endphp
    <div class="page page-center">
        <div class="container-tight py-4">
                <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{asset('./back/static/logo.svg')}}" height="36" alt="logo"></a>
                </div>
                <form class="card card-md" wire:submit.prevent="verificationHandeler()" method="POST">
                    @csrf
                    <div class="card-body">
                        @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif
                    <h2 class="card-title text-center mb-4">verification Email</h2>
                    <p class="text-muted mb-4">Please check your email for a verification link. if you did not receive the email . click on the button below, we will send an email to activate your account again</p>
                    <div class="form-footer text-center">
                            <button  type="submit" class="btn btn-primary w-100" id="SendVerification">
                            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="3" y="5" width="18" height="14" rx="2"></rect><polyline points="3 7 12 13 21 7"></polyline></svg>
                            Send me email again
                            </button>
                            <br>
                            <br>
                            <a class="btn btn-outline-secondary" href="{{route('logout')}}">Logout</a>
                    </div>
                    </div>
                </form>
        </div>
    </div>

</div>
