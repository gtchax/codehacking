@extends('layouts.admin')

@section('content')

   @if(Session::has('deleted_category'))
    <p class="bg-danger">{{session('deleted_categoyr')}}</p>
  @endif

   <h1>Categories</h1>

   <div class="col-sm-5">
      {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

        <div class="form-group">

            {!! Form::label('name', 'Category:')!!}
            {!! Form::text('name', null, ['class' => 'form-control'])!!}
        </div>
      
        <div class="form-group">

            {!! Form::submit('Create Category', ['class'=> 'btn btn-success'])!!}

        </div>

      {!! Form::close()!!}
</div>


@include('_partials.form-errors')

<div class="col-sm-7">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created date</th>
        <th>Updated at</th>

    </thead>
    <tbody>
        @if($categories)
            @foreach($categories as $category)
      <tr>
        <td>{{$category->id}}</td>
        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date' }}</td>
        <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'no update' }}</td>
  
      </tr>
        @endforeach
      @endif
     
    </tbody>
  </table>
</div>

<div class="col-sm-5">

</div>

   


@endsection
