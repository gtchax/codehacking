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
          </tr>
        @endforeach
          
        </tbody>
    </table>


    @else

    <h1 class="text-center">No Comments</h1>



@endif

@endsection