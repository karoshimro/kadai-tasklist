@extends('layouts.app')

@section('content')

   <h1>id: {{ $task->id }} のタスク編集ページ</h1>
 
    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
         
         {!! Form::label('status', 'ステータス:') !!}
        {!! Form::text('status', null, ['class' => 'form-control']) !!}

        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}

        {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}


@endsection