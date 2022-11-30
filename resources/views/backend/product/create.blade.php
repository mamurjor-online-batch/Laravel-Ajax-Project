@extends('layouts.backend')

@section('content')
    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between">New Product
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
        </h4>
    </div>
    <div class="card-body px-0">
        @include('backend.include.alert')
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control form-control-sm" name="product_name" id="product_name">
                                @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_slug" class="form-label">Product Slug</label>
                                <input type="text" class="form-control form-control-sm" name="product_slug" id="product_slug">
                                @error('product_slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_code" class="form-label">Product Code</label>
                                <input type="text" class="form-control form-control-sm" name="product_code" id="product_code">
                                @error('product_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control form-control-sm" name="qty" id="quantity">
                                @error('qty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control form-control-sm" name="price" id="price">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="feature_image" class="form-label">Feature image</label>
                                <input type="file" class="form-control form-control-sm" name="image" id="feature_image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="brand" class="form-label">Brand</label>
                                <select name="brand_id" id="brand" class="form-control form-control-sm">
                                    <option value="">Brand Select</option>
                                    @forelse ($data['brands'] as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @empty

                                    @endforelse
                                </select>
                                @error('brand_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category_id" id="category" class="form-control form-control-sm">
                                    <option value="">Category Select</option>
                                    @forelse ($data['categories'] as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty

                                    @endforelse
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    <option value="0">Pending</option>
                                    <option value="1">Published</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-sm btn-primary" type="submit">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
