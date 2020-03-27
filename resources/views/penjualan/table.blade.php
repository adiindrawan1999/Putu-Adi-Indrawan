<table class="table table-responsive" id="penjualans-table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Pegawai</th>
            <th>Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($penjualan as $pen)
        <tr>
            <td>{!! $pen->tanggal !!}</td>
            <td>{!! $pen->pelanggan->nama !!}</td>
            <td>{!! $pen->pegawai->nama !!}</td>
            <td>{!! $pen->total !!}</td>
            <td>
                {!! Form::open(['route' => ['penjualan.destroy', $pen->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('penjualan.show', [$pen->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('penjualan.edit', [$pen->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>