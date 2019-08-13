{!! Form::open(['route' => ['provinces.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('provinces.show', $id) }}" class='btn btn-default btn-sm'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('provinces.edit', $id) }}" class='btn btn-default btn-sm'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
