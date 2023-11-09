<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
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
                        <th scope="col">Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                      <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->user_id}}</td>
                        <td>{{$category->created_at}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
                <div class="col-md-4">
                  <div class=card>
                  <form method="post" action="">
                    <div class="form-group">
                      <label for="category_name">Category Name</label>
                      <input type="text" class="form-control" name="category_name">
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
