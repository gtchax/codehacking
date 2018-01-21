@extends('layouts.admin')

@section('content')

<h1>Edit Users</h1>

<div class="col-sm-3">

    <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" alt="" class="img-responsive img-rounded">

    <div style="margin-top: 20px">
        {!! Form::close()!!}
        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete user',['class' => 'btn btn-danger col-sm-12'])!!}
            </div>
        

        {!! Form::close()!!}
    </div>

</div>

<div class="col-sm-9">

    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

        <div class="form-group">

            {!! Form::label('name', 'Name:')!!}
            {!! Form::text('name',null,['class' => 'form-control'])!!}
        </div>
        <div class="form-group">

            {!! Form::label('email', 'Email:')!!}
            {!! Form::email('email',null,['class' => 'form-control'])!!}
        </div>
        <div class="form-group">

            {!! Form::label('password', 'Password:')!!}
            {!! Form::password('password',['class' => 'form-control'])!!}
        </div>
        <div class="form-group">

            {!! Form::label('photo_id', 'User photo:')!!}
            {!! Form::file('photo_id', null)!!}
        </div>
        <div class="form-group">

            {!! Form::label('is_active', 'Status:')!!}
            {!! Form::select('is_active',[1 => 'Active', 0 => 'Non Active'], null, ['class' => 'form-control'])!!}
        </div>
        <div class="form-group">

            {!! Form::label('role_id', 'Role:')!!}
            {!! Form::select('role_id', $roles, null, ['class' => 'form-control'])!!}
        </div>
        <div class="form-group">

            {!! Form::submit('Update User', ['class'=> 'btn btn-success col-sm-6'])!!}

        </div>

   

</div>

@include('_partials.form-errors')



@endsection