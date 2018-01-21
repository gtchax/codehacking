@extends('layouts.admin')

@section('content')

<h1>Edit Users</h1>

<div class="col-sm-3">

    <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" alt="" class="img-responsive img-rounded">

</div>

<div class="col-sm-9">

    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@edit', $user->id], 'files'=>true]) !!}

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
            {!! Form::select('is_active',[1 => 'Active', 0 => 'Non Active'], 0, ['class' => 'form-control'])!!}
        </div>
        <div class="form-group">

            {!! Form::label('role_id', 'Role:')!!}
            {!! Form::select('role_id', $roles, null, ['class' => 'form-control'])!!}
        </div>
        <div class="form-group">

            {!! Form::submit('Create User', ['class'=> 'btn btn-success'])!!}

        </div>

    {!! Form::close()!!}

</div>

@include('_partials.form-errors')



@endsection