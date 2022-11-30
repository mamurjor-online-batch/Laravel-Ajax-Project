<x-layouts.backend>

    <x-slot name="title">
        Product List
    </x-slot>

    <div class="card-header">
        <h4 class="card-title mb-0 d-flex justify-content-between">
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-outline-primary">Add New</a>
        </h4>
    </div>
    <div class="card-body">
        @include('backend.include.alert')

        @php
            $class = 'alert alert-danger';
        @endphp

        <x-product :class="$class" type="fw-bold"/>
        <x-brand>
            I am a web developer
        </x-brand>

        <table class="table table-sm table-striped table-hover table-bordered">
            <thead>
                <th>SL</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Feature Image</th>
                <th>Action</th>
            </thead>
            <tbody>
                @if ($products->count() > 0)
                    @foreach ($products as $key=>$product)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ lowercase($product->product_name) }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>{{ $product->price }}</td>
                            <td><img width="60" height="60" src="{{ $product->image != null ? asset('images/products/'.$product->image) : 'https://via.placeholder.com/60' }}" alt=""></td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-success">View</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info">Edit</a>

                                <form class="d-none" id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <button type="button" onclick="alert_message({{ $product->id }})" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</x-layouts.backend>
