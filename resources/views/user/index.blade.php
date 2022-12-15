@extends('app')
@section('content')
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<div class="card card-default">
    <div class="card-header">
        <form class="row row-cols-auto g-1">
            <div class="col">
                <input class="form-control" type="text" name="q" value="{{ $q }}" placeholder="Search here..." />
            </div>
            <div class="col">
                <button class="btn btn-success">Refresh</button>
            </div>
        </form>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Project</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            @foreach($user as $users)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $users->nama_project }}</td>
                <td>{{ $users->keterangan }}</td>
                <td>{{ $users->status }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection