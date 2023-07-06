@extends('layouts.app')
@section('title', 'Daftar Rak Buku')
@section('content')
<style>
    /* #progressbar{
        position:relative;
	width:100%;
	height:22px;
	background:rgba(255,255,255,.05);
	border-radius:25px;
	display:flex;
	align-items:center;
	border:5px solid #1b1f23;
    } */
    /* .container{
	position:relative;
	text-align:center;
}
.container .Loading{
	position:relative;
	width:100%;
	height:22px;
	background:rgba(255,255,255,.05);
	border-radius:25px;
	display:flex;
	align-items:center;
	border:1px solid #1b1f23;
}
.container .Loading span{
	position:absolute;
	width:0%;
	height:100%;
	background-color:#0fbcf9;
	border-radius:25px;
}
.container i{
	color:#fff;
	font-size:5em;
} */
</style>
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
  </script>


<!-- <div id="progressbar"></div> -->

    <h2>{{ $store }} Data Rak Buku</h2>
    <form method="POST" action="{{$action}}">
        @csrf
        @if (strtolower($store) == 'ubah')
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ $rak->id }}" />
        <input type="text" class="mail_text" name="nama" placeholder="Nama Rak" value="{{ $rak->nama }}" title="Masukkan Nama Rak"/><br>
        @error('nama')
            <b>{{ $message }}</b>
        @enderror<br>
        <input type="text" class="mail_text" name="lokasi" placeholder="Lokasi" value="{{ $rak->lokasi }}" /><br>
        @error('lokasi')
            <b>{{ $message }}</b>
        @enderror<br>
        <input type="text" class="mail_text" name="keterangan" placeholder="keterangan" value="{{ $rak->keterangan }}" /><br>
        <input type="text"  class="mail_text" id="datepicker" name="tanggal" placeholder="tanggal" /></br>
        
        <input type="submit" class="btn btn-success mt-3" value="{{ $store }}" />
        <div class="send_bt">
            <a href="{{ url('/rak_buku') }}">Kembali</a>
        </div>
    </form>
        <p>
        <label for="amount">jumlah minimal:</label>
        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
        </p>
        <div id="slider-range-max"></div><br>
@endsection
