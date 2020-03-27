<table class="table table-responsive" id="pegawais-table">
    <thead>
        <tr>
            <th>Nik</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Foto</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pegawai as $p)
        <tr>
            <td>{!! $p->nik !!}</td>
            <td>{!! $p->nama !!}</td>
            <td>{!! $p->tempat_lahir !!}</td>
            <td>{!! $p->tanggal_lahir !!}</td>
            <td>{!! $p->alamat !!}</td>
            <td>{!! $p->email !!}</td>
            <td>{!! $p->telp !!}</td>
            <td>{!! $p->foto !!}</td>
            <td>
                {!! Form::open(['route' => ['pegawai.destroy', $p->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pegawai.show', [$p->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pegawai.edit', [$p->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>