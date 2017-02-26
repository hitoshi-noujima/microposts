<ul class="nav nav-tabs nav-justified">
     <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}">
         <a href="{{ route('users.show', ['id' => $user->id]) }}">Microposts <span class="badge">{{ $count_microposts }}</span></a>
    </li>
    <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}">
        <a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a>
    </li>
    <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}">
        <a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a>
    </li>
    @if (Auth::user()->id == $user->id)
        <li role="presentation" class="{{ Request::is('users/*/favorites') ? 'active' : '' }}">
            <a href="{{ route('users.favorites', ['id' => $user->id]) }}">favorites <span class="badge">{{ $count_favorites }}</span></a>
        </li>
    @endif
</ul>