<div>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="avatar avatar-md" style="background-image: url({{asset($user->photo)}})"></span>
            </div>
            <div class="col-md-6">
                <h2 class="page-title">{{$user->name}}</h2>
                <div class="page-subtitle">
                <div class="row">
                    <div class="col-auto">
                    <a href="#" class="text-reset">{{$user->username}}| {{$user->usertype->name}}</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-auto  d-md-flex">
                <input type="file" name="file" class="d-none" id="inputPhoto">
                <button class="btn btn-primary" id="btnChangephoto">
                Change Picture
                </button>
            </div>
        </div>
    </div>
</div>
