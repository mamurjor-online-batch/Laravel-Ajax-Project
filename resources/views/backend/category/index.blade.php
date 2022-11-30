@extends('layouts.backend')

@section('content')
    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between">Category List
            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-primary">Add New</a>
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-sm table-striped table-hover table-bordered">
            <thead>
                <th>SL</th>
                <th>Category Name</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @forelse ($categories as $value)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            @if ($value->status == 1)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-danger">Pending</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('categories.edit',$value->id) }}" class="btn btn-sm btn-info me-1">Edit</a>

                                <form id="delete-form-{{ $value->id }}" action="{{ route('categories.delete', $value->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <button type="button" onclick="alert_message({{ $value->id }})" class="btn btn-sm btn-danger">Delete</button>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-danger text-center">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
