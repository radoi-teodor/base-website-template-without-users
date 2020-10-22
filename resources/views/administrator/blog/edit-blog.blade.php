@extends('layouts.administrator')

@section('title', 'Search blog to edit')

@section('content')

  <div class="col-md-8 offset-md-2 col-xs-12 mt-3">
      <div class="card">
          <div class="card-header">Find blog to edit</div>
          <div class="card-body">
            <form action="{{ url('/administrator/edit-blog') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">ID/Blog Name *</label>
                    <input type="text" class="form-control" placeholder="Enter ID/Blog Name" name="input" required>
                </div>

                <p class="text-danger">If there are two or more products with the
                                       same name, the first one will be editted.
                                       Please use the ID for this kind of situations.</p>

                <button type="submit" class="btn btn-primary">Find</button>

            </form>
          </div>
      </div>
  </div>

@endsection
