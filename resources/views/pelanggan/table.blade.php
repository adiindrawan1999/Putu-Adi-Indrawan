<table class="table table-responsive" id="pelanggans-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pelanggan as $p)
        <tr>
            <td>{!! $p->nama !!}</td>
            <td>{!! $p->alamat !!}</td>
            <td>{!! $p->telp !!}</td>
            <td>
                {!! Form::open(['route' => ['pelanggan.destroy', $p->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pelanggan.show', [$p->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pelanggan.edit', [$p->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>