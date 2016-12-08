<div class="[ panel panel-default ] panel-google-plus">
    <div class="panel-heading">
        <img class="img-circle pull-left profile-picture"
             src="http://placehold.it/160x160"
             alt="Profile Picture"/>

        <h3>{{$comment->user->name}}</h3>
        <h5>{{$comment->present()->createdTime}}</h5>
    </div>
    <div class="panel-body">
        <p>{{$comment->content}}</p>
        @if(count($comment->attachment) > 0)
        <p>
            <a href="{{route('downloads', $comment->attachment->alias)}}">{{$comment->attachment->orginal_name}}</a>
        </p>
        @endif
    </div>
</div>
