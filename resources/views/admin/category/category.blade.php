  @php
      use Carbon\Carbon;
  @endphp

  <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              All Category<br>Welcome, {{ auth()->user()->name }}
          </h2>
      </x-slot>

      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="container">
                <div class="row">
                  <div class="col-md-8">
                  <div class="card">
                    <table class="table table-dark table-striped table-hover">
                    <thead>
                      <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">User Id</th>
                          <th scope="col">Image</th>
                          <th scope="col">Created At</th>
                          <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->user_id }}</td>
                        <td>
                            @if($category->category_img)
                                <img src="{{ asset('storage/' . $category->category_img) }}" style="max-width: 100px; max-height: 100px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ Carbon::parse($category->created_at)->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                            <form method="post" action="{{ route('categories.destroy', $category->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                  </div>
                  </div>
                  <div class="col-md-4">
                    <div class=card>
                      <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" name="category_name">
                        </div>
                        <div class="form-group">
                          <label for="category_img" class="form-label">Image</label>
                          <input class="form-control" type="file" name="category_img">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
  </x-app-layout>
