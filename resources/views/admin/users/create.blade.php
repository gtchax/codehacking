@extends('layouts.admin')

@section('content')

<h1>Create New Users</h1>

{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

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
        {!! Form::select('role_id',[''=>'Choose Options'] + $roles, null, ['class' => 'form-control'])!!}
    </div>
    <div class="form-group">

        {!! Form::submit('Create User', ['class'=> 'btn btn-success'])!!}

    </div>

{!! Form::close()!!}

@include('_partials.form-errors')



@endsection