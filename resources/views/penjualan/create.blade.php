@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penjualan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'penjualan.store']) !!}

                        @include('penjualan.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        var i=1
        $('.select-barang').select2({
            theme: "bootstrap",
            placeholder: 'Pilih Barang'
        });
        $('.select-barang').on("select2:select", function(e) { 
            var id = $(this).val();
            $.get("/barang/"+id, function(data, status){
                $('#kode').val(data.kode);
                $('#nama').val(data.nama);
                $('#harga').val(data.harga);
            });
            $('#jumlah').focus();
        });
        $('#btn-tambah').on('click',function(e){
            $('#subtotal').val(parseInt($('#harga').val())*parseInt($('#jumlah').val()));

            $("#daftar-penjualan").append('<div class="row">'+
                '<div class="col-md-1">'+i+'</div>'+
                '<div class="col-md-2"><input type="text" readonly class="form-control" name="kode[]" value="'+$('#kode').val()+'"></div>'+
                '<div class="col-md-3"><input type="text" readonly class="form-control" name="nama[]" value="'+$('#nama').val()+'"></div>'+
                '<div class="col-md-2 "><input type="text" readonly class="text-right form-control" name="harga[]" value="'+$('#harga').val()+'"></div>'+
                '<div class="col-md-2 "><input type="text" readonly class="text-right form-control" name="jumlah[]" value="'+$('#jumlah').val()+'"></div>'+
                '<div class="col-md-2 "><input type="text" readonly class="text-right form-control subtotal" name="subtotal[]" value="'+$('#subtotal').val()+'"></div>'+
            '</div>');
            i++;
            $('#kode').val('');
            $('#nama').val('');
            $('#harga').val('');
            $('#jumlah').val('');
            $('#subtotal').val('');
            $('.select-barang').val(null).trigger('change');

            var total = 0;
            $(".subtotal").each(function() {
                total += parseInt($(this).val());
            });
            $('#total').val(total);
            
            e.preventDefault();
        })
    });
</script>
@endsection