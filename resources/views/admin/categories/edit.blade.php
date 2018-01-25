@extends('layouts.admin')

@section('content')

   @if(Session::has('deleted_category'))
    <p class="bg-danger">{{session('deleted_category')}}</p>
  @endif

   <h1>Edit Categories</h1>
<div class="row">


    <div class="col-sm-6">
        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update',$category->id]]) !!}

            <div class="form-group">

                {!! Form::label('name', 'Category:')!!}
                {!! Form::text('name',null,['class' => 'form-control'])!!}
            </div>
        
            <div class="form-group">

                {!! Form::submit('Update Category', ['class'=> 'btn btn-success'])!!}

            </div>

        {!! Form::close()!!}
    </div>


    @include('_partials.form-errors')

    <div class="col-sm-6" style="margin-top: 2em;">
        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

        
            <div class="form-group">

                {!! Form::submit('Delete Category', ['class'=> 'btn btn-danger'])!!}

            </div>

        {!! Form::close()!!}
    </div>

</div>
   


@endsection
