@extends('layouts.app')
@section('title', 'Daftar Rak Buku')
@section('content')


<!-- <div id="progressbar"></div> -->

    <h2>{{ $store }} Data Rak Buku</h2>
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <form method="POST" action="{{$action}}">
        @csrf
        @if (strtolower($store) == 'ubah')
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ $rak->id }}" />
        <input type="text" class="mail_text" id="nama" name="nama" placeholder="Nama Rak" value="{{ $rak->nama }}" title="Masukkan Nama Rak"/><br>
        @error('nama')
            <b>{{ $message }}</b>
        @enderror<br>
        <input type="text" class="mail_text" id="lokasi" name="lokasi" placeholder="Lokasi" value="{{ $rak->lokasi }}" /><br>
        @error('lokasi')
            <b>{{ $message }}</b>
        @enderror<br>
        <input type="text" class="mail_text" id="keterangan" name="keterangan" placeholder="keterangan" value="{{ $rak->keterangan }}" /><br>
        <!-- <input type="text"  class="mail_text" id="datepicker" name="tanggal" placeholder="tanggal" /></br> -->
        
        <!-- <input type="submit" class="btn btn-success mt-3" value="{{ $store }}" /> -->
        <button class="save_bt btn btn-primary" id="btn-save">
         Simpan
        </button>
        <div class="send_bt">
            <a href="{{ url('/rak_buku') }}">Kembali</a>
        </div>
    </form>
        <!-- <p>
        <label for="amount">jumlah minimal:</label>
        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
        </p>
        <div id="slider-range-max"></div><br> -->
        
<script>
        $(function () {
            $("#datepicker").datepicker();   
        });
        $( function() {
    $( document ).tooltip();
  } );
</script>
<script>
  $( function() {
    $( "#slider-range-max" ).slider({
      range: "max",
      min: 1,
      max: 100,
      value: 0,
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.value );
      }
    });
    $( "#amount" ).val( $( "#slider-range-max" ).slider( "value" ) );
  } );

  $("#btn-save").click(function(e) {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
      });
      e.preventDefault();
      var formData = {
      nama: $('#nama').val(),
      lokasi: $('#lokasi').val(),
      keterangan: $('#keterangan').val()
      };
      var state = $('#btn-save').val();
      var type = "POST";
      var id = $('#id').val();
      var ajaxurl = '{{ $action }}';
      $.ajax({
        type: type,
        url: ajaxurl,
        data: formData,
        dataType: 'json',
        success: function(data) {
        var todo = 'Pengiriman Data berhasil'
        // console.log(todo)
        alert(todo)
        window.location.href = "{{url('rak_buku')}}"
        },
        error: function(data) {
        console.log(data);
        alert(data.responseJSON.message)
        }
      });
    });
  </script>

@endsection
