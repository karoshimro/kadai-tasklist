@extends('layouts.app')

@section('content')
@if ($task ==! null)

    @if (Auth::user()->id == $task->user_id)
            <table class="table table-bordered">
                <tr>
                    <th>id</th>
                    <td>{{ $task->id }}</td>
                </tr>
                <tr>
                    <th>ステータス</th>
                    <td>{{ $task->status }}</td>
                </tr>
                <tr>
                    <th>タスク</th>
                    <td>{{ $task->content }}</td>
                </tr>
            </table>
            
         {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id], ['class' => 'btn btn-default']) !!} 
         {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
         {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
         {!! Form::close() !!}
    
    @else
        <?php echo "errorA"; ?>
    @endif
 <?php echo "errorD"; ?>
@else
<?php echo "errorB";?>

@endif
<?php echo "errorC" ?>


@endsection