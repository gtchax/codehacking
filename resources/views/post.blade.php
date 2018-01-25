@extends('layouts.blog-post')


@section('content')
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->content}}</p>

    <hr>

    @if(Session::has('comment_message'))

        <div class="alert alert-success">
            {{session('comment_message')}}
        </div>
            

    @endif

    <!-- Blog Comments -->

    @if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
       {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

            <div class="form-group">
                {!! Form::label('content', 'Content:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'rows'=>3]) !!}
            </div>
            <div class="form-group">
               {!! Form::submit('Submit comment', ['class' => 'btn btn-primary']) !!}
            </div>

       {!! Form::close() !!}
    </div>

    @endif

    <hr>

    <!-- Posted Comments -->

    @if(count($comments) > 0)

        @foreach($comments as $comment)
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" height="64" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
           <p>{{$comment->content}}</p>

            @if(count($comment->replies) > 0)

                @foreach($comment->replies as $reply)

                    @if($reply->is_active == 1)

                            <!-- Nested Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="64" src="{{$reply->photo}}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                <p>{{$reply->content}}</p>
                                </div>
                                <div class="comment-reply-container">
                                    <button class="btn btn-primary pull-right toggle-replies">Reply</button>
                                    <div id="comment-reply" class="col-sm-9">
                                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                                            <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                            <div class="form-group">
                                                {!! Form::label('content', 'Reply:') !!}
                                                {!! Form::textarea('content', null, ['class' => 'form-control', 'rows'=>1]) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::submit('Submit reply', ['class' => 'btn btn-primary']) !!}
                                            </div>

                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div> <!-- End Nested Comment -->
                    @endif
                @endforeach
            @endif
        </div>
    </div>
        @endforeach
    @endif

@endsection

@section('scripts')

<script>
    $(".toggle-replies").click(function(){

        $(this).next().slideToggle("slow");
    })
</script>

@endsection