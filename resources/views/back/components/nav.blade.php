<ul>
    <li class="active"><a href="{{route('home')}}">Home</a></li>
    <li><a href="{{ route("shop") }}">Shop</a></li>
    <li><a href="{{ route("checkout") }}">Check Out</a></li>
    <li><a href="{{ route("contact") }}">Contact</a></li>
    @auth
        @if(auth()->user()->usertype->name == "Admin")
             <li><a data-turbo="false" href="{{ route("dashboard") }}">Dashboard</a></li>
        @endif
    @endauth
</ul>
