<!--<ul class="media-list">-->
<?php
class Jumping{
  public function jump(){
    return view('welcome');
    // echo "jump";
}  
}
?>
    <table class='table'>
        <th>user</th>
        <th>content</th>
        <th>status</th>
        <th></th>
        <th>DELETE BUTTON</th>
@foreach ($tasks as $task)
    <?php $user = $task->user; ?>
    <!--<li class="media">-->

        <!--<div class="media-body">-->
                    
            <div>
                <!--<p>{!! nl2br(e($task->content)) !!}</p>-->
            </div>
             <div>
                 
                @if (Auth::user()->id == $task->user_id)
                <tr>
                <td>{!! link_to_route('tasks.show', $user->name, ['id' => $task->id]) !!} </td>
                 <!--<span class="text-muted">posted at {{ $task->created_at }}</span>-->
                <td>{!! nl2br(e($task->content)) !!}</td>
                <td>{!! nl2br(e($task->status)) !!}</td>
                <td>{!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}</td>
                <td>{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}</td>
                </tr>
                    {!! Form::close() !!}
               
                @endif
            </div>
        <!--</div>-->
    <!--</li>-->
@endforeach
</table>
</ul>
