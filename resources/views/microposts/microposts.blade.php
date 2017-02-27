<ul class="media-list">
@foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}
                <span class="text-muted">posted at {{ $micropost->created_at }}</span>
            </div>
            <div>
                @if (Auth::user()->is_favorite($micropost->id))
                    {!! Form::open(['route' => ['user.removefavorite', $micropost->id], 'method' => 'delete']) !!}
                        {!! Form::submit('★ remove', ['class' => "btn btn-info btn-xs"]) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['user.addfavorite', $micropost->id]]) !!}
                        {!! Form::submit('☆ add', ['class' => "btn btn-default btn-xs"]) !!}
                    {!! Form::close() !!}
                @endif
            </div>
            <div>
                <p>{!! nl2br(e($micropost->content)) !!}</p>
            </div>
            <div>
                @if (Auth::user()->id == $micropost->user_id)
                    {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $microposts->render() !!}