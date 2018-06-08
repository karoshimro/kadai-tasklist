
    <table class='table'>
        <th>user</th>
        <th>content</th>
        <th>status</th>
        <th></th>
        <th>DELETE BUTTON</th>
@foreach ($tasks as $task)
    <?php $user = $task->user; ?>
    <div>
                 
                @if (Auth::user()->id == $task->user_id)
                <tr>
                <td>{!! link_to_route('tasks.show', $user->name, ['id' => $task->id]) !!} </td>
                <td>{!! nl2br(e($task->content)) !!}</td>
                <td>{!! nl2br(e($task->status)) !!}</td>
                <td>{!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}</td>
                <td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}</td>
                </tr>
                    {!! Form::close() !!}
               
                @endif
            </div>
@endforeach
</table>
</ul>
