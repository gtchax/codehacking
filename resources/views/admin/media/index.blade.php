@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

      @if(Session::has('deleted_photo'))
    <p class="bg-danger">{{session('deleted_photo')}}</p>
  @endif

    <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created</th>
    </thead>
    <tbody>
        @if($photos)
            @foreach($photos as $photo)
      <tr>
        <td>{{$photo->id}}</td>
        <td><img src="{{$photo->file}}" alt="" height="50"></td>
        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date' }}</td>
        <td>
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}

                <div class="form-group">

                    {!! Form::submit('Delete', ['class'=> 'btn btn-danger'])!!}

                </div>

            {!! Form::close()!!}
        </td>
      </tr>
        @endforeach
      @endif
     
    </tbody>
  </table>

@endsection