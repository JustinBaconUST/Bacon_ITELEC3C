<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category: {{ $category->category_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="category_img" class="form-label">Image</label>
                                    <input class="form-control" type="file" name="category_img">
                                    @if($category->category_img)
                                        <img src="{{ asset('storage/' . $category->category_img) }}" style="max-width: 100px; max-height: 100px;">
                                    @else
                                        No Image
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>