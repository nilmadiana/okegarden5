@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('designer.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Project<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_project" value="{{ old('nama_project') }}" />
            </div>
            <div class="mb-3">
                <label>Keterangan<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="keterangan" value="{{ old('keterangan') }}" />
            </div>
            <div class="mb-3">
                <label>Status</label>
                <input class="form-control" type="text" name="status" value="{{ old('status') }}" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('designer.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection