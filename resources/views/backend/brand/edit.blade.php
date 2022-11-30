<x-layouts.backend>
    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between">Edit Brand
            <a href="{{ route('brands.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8 mx-auto">
                {{-- alert --}}
                @include('backend.include.alert')

                <form action="{{ route('brands.update', $brand->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="brand_name" class="form-label">Brand Name</label>
                        <input type="text" name="brand_name" value="{{ $brand->name }}" class="form-control" id="brand_name">
                        @error('brand_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Pending</option>
                            <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.backend>
