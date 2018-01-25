@extends('layouts.admin')

@section('content')

<h1>Replies</h1>

@if(count($replies) > 0)

    <table class="table">
        <thead>
            <th>ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>Reply Content</th>
          
        </thead>
        <tbody>
         
        @foreach($replies as $reply)
              <tr>
                <td>{{$reply->id}}</td>
                <td>{{$reply->author}}</td>
                <td>{{$reply->email}}</td>
                <td>{{$reply->content}}</td>
                <td><a href="{{route('home.post', $reply->comment->post->id)}}" alt="">View Post</a></td>
                <td>
                    @if($reply->is_active == 1)

                        {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update', $reply->id]]) !!}
                            
                            <input type="hidden" name="is_active" value="0">
                        
                                 {!! Form::submit('Un-approve',['class'=>'form-control btn btn-success'])!!}
                           
                           
                        {!! Form::close() !!}

                    @else
                     {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update', $reply->id]]) !!}
                            
                            <input type="hidden" name="is_active" value="1">
                        
                                 {!! Form::submit('Approve', ['class'=>' form-control btn btn-primary'])!!}
                         
                           
                        {!! Form::close() !!}

                    @endif
                
                </td>
                <td>
                    {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
                            
                        {!! Form::submit('Delete', ['class'=>' form-control btn btn-danger'])!!}
                            
                            
                    {!! Form::close() !!}
                    
                </td>
          </tr>
        @endforeach
          
        </tbody>
    </table>


    @else

    <h1 class="text-center">No Replies</h1>



@endif

@endsection