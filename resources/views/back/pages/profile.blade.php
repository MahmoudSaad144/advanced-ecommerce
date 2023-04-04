@extends('back.layouts.app')

@section('title')
    Profile
@endsection

@section('content')

    @livewire('auth.profile-header')
<br>
<div class="row">
    <div class="card">
        <ul class="nav nav-tabs" data-bs-toggle="tabs">
        <li class="nav-item">
            <a href="#tabs-details" class="nav-link active" data-bs-toggle="tab">Personal Details</a>
        </li>
        <li class="nav-item">
            <a href="#tabs-password" class="nav-link" data-bs-toggle="tab">Change Password</a>
        </li>
        </ul>
        <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active show" id="tabs-details">
            <div>
                @livewire('auth.personal-details')
            </div>
            </div>
            <div class="tab-pane" id="tabs-password">
                <div>
                    @livewire('auth.change-password')
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
var inputPhoto = document.getElementById('inputPhoto');
var btnChangephoto = document.getElementById('btnChangephoto');
btnChangephoto.onclick = function(){
    inputPhoto.click()
}
        $('#inputPhoto').ijaboCropTool({
            preview : '.image-previewer',
            setRatio:1,
            allowedExtensions: ['jpg', 'jpeg','png'],
            buttonsText:['CROP','QUIT'],
            buttonsColor:['#30bf7d','#ee5155', -15],
            processUrl:'{{ route("crop") }}',
            withCSRF:['_token','{{ csrf_token() }}'],
            onSuccess:function(message, element, status){
                livewire.emit('updateProfileHeader')
                livewire.emit('updateTopHeader')
                toastr.success(message);
            },
            onError:function(message, element, status){
                toastr.error(message);
            }
        });
    </script>
@endpush
