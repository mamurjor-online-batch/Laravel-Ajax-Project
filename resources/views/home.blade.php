@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="d-flex align-items-center">
                            <div class="mb-3">
                                <label for="avatar" class="form-label">File Upload</label>
                                <input type="file" id="avatar" class="form-control form-control-sm" name="avatar">
                            </div>

                            <button class="btn btn-sm btn-primary mt-3 ms-3" type="submit">Uploaded</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
