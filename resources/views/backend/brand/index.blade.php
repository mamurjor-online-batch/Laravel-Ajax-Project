<x-layouts.backend>

    <x-slot name="title">
        Brand List
    </x-slot>

    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between">Brand List
            <a href="{{ route('brands.create') }}" class="btn btn-sm btn-outline-primary">Add New</a>
        </h4>
    </div>
    <div class="card-body">
        @php
            $meesage = 'Error brand name?';
        @endphp

        <x-example :message="$meesage" class="fw-bolder" type="danger">

        </x-example>

        <table class="table table-sm table-striped table-hover table-bordered">
            <thead>
                <th>SL</th>
                <th>Brand Name</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @forelse ($brands as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
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
                                <a href="{{ route('brands.edit',$value->id) }}" class="btn btn-sm btn-info me-1">Edit</a>

                                <form id="delete-form-{{ $value->id }}" action="{{ route('brands.delete', $value->id) }}" method="POST">
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

        {{ $brands->onEachSide(2)->links() }}

    </div>

</x-layouts.backend>

