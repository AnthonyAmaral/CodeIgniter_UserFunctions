<nav>
    <ul>
        <li><a href="{{ URL::route('home') }}">Home</a></li>
        @if(Auth::check())
        <li><a href="{{ URL::route('profile-user', array('username' => Auth::user()->username)) }}">{{ Auth::user()->username }}</a></li>
            <li><a href="{{URL::route('account-logout')}}">Logout</a></li>
            <li><a href="{{URL::route('account-change-password')}}">Change Password</a></li>
            
        @else
            <li><a href="{{URL::route('account-login')}}">Login</a></li>
            <li><a href="{{URL::route('account-create')}}">Sign up</a></li>
            <li><a href="{{URL::route('account-forgot-password')}}">Forgot Password</a></li>
        @endif
    </ul>
</nav>