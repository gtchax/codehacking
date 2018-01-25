@extends('layouts.admin')

@section('content')

<h1>Comments</h1>

@if(count($comments) > 0)

    <table class="table">
        <thead>
            <th>ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>Content</th>
          
        </thead>
        <tbody>
         
        @foreach($comments as $comment)
              <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->content}}</td>
                <td><a href="{{route('home.post', $comment->post->id)}}" alt="">View Post</a></td>
                <td><a href="{{route('replies.show', $comment->id)}}">View replies</a></td>
                <td>
                    @if($comment->is_active == 1)

                        {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]]) !!}
                            
                            <input type="hidden" name="is_active" value="0">
                        
                            {!! Form::submit('Un-approve',['class'=>'form-control btn btn-success'])!!}
                           
                           
                        {!! Form::close() !!}

                    @else
                     {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]]) !!}
                            
                            <input type="hidden" name="is_active" value="1">
                        
                            {!! Form::submit('Approve', ['class'=>' form-control btn btn-primary'])!!}
                         
                           
                        {!! Form::close() !!}

                    @endif
                
                </td>
                <td>
                    {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                            
                        {!! Form::submit('Delete', ['class'=>' form-control btn btn-danger'])!!}
                            
                            
                    {!! Form::close() !!}
                    
                </td>
          </tr>
        @endforeach
          
        </tbody>
    </table>


    @else

    <h1 class="text-center">No Comments</h1>



@endif

@endsection