@extends('layouts.admin')

@section('content')

<h1>Edit Post</h1>


<div class="row">

<div class="col-sm-4">

<img src="{{$post->photo->file}}" alt="" class="img-responsive">

  {!! Form::close()!!}
    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete Post',['class' => 'btn btn-danger col-sm-6'])!!}
        </div>
    

    {!! Form::close()!!}

</div>

    <div class="col-sm-8">
        {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

            <div class="form-group">

                {!! Form::label('title', 'Title:')!!}
                {!! Form::text('title',null,['class' => 'form-control'])!!}
            </div>
            <div class="form-group">

                {!! Form::label('category_id', 'Category:')!!}
                {!! Form::select('category_id', $categories, null,['class' => 'form-control'])!!}
            </div>
            <div class="form-group">

                {!! Form::label('photo_id', 'Photo:')!!}
                {!! Form::file('photo_id', null)!!}
            </div>
            <div class="form-group">

                {!! Form::label('content', 'Content:')!!}
                {!! Form::textarea('content',null,['class' => 'form-control'])!!}
            </div>
        
            <div class="form-group">

                {!! Form::submit('Update Post', ['class'=> 'btn btn-success col-sm-4'])!!}

            </div>

        {!! Form::close()!!}

    </div>

  
    
</div>
<div class="row" style="margin-top: 2em">

@include('_partials.form-errors')

</div>


@endsection