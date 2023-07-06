@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-5">
<div class="col-md-8">
<div class="card">
<div class="card-header">Dashboard</div>
<div class="card-body">
@if ($message = Session::get('success'))
<div class="alert alert-success">
{{ $message }}
</div>
@else
<div class="alert alert-success">
You are logged in!
</div>
@endif
<table class="table">
    <thead class="table-dark">
        <tr>
            <th>No.</th>
            <!-- <th>ID</th> -->
            <th>Nama Rak</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
        @php
            $i = 1;
        @endphp
        @foreach ($rak as $r)
            <tr>
                <td>{{ $i }}</td>
                <!-- <td>{{ $r->id }}</td> -->
                <td>{{ $r->nama }}</td>
                <td>{{ $r->lokasi }}</td>
                <td>{{ $r->keterangan }}</td>
                <td>
                    <a class="btn btn-warning" href="rak_buku/{{ $r->id }}/edit">Edit</a>
                    <a class="btn btn-danger" href="rak_buku/{{ $r->id }}">Hapus</a>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    </table>
<form action="{{url('logout')}}" method="post">
    @csrf
    <input type="submit" value="logout" class="btn btn-danger col-md-5 offset-md-4">
</form>
</div>
</div>
</div>
</div>
@endsection
