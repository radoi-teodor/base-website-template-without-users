@extends('layouts.administrator')

@section('title', 'Administrators manager')

@section('content')

  <div class="col-12">

  <div class="card">
      <div class="card-body">

        <h4 class="header-title">Other users</h4>

        @if(count($users)>0)
          @foreach ($users as $user)

            <div class="row border py-3">

              <div class="col-4">
                <p>{{ $user->name }}</p>
              </div>

              <div class="col-4">
                <p>{{ $user->email }}</p>
              </div>

              <div class="col-4">
                <a href="/administrator/delete-user/{{ $user->id }}" class="text-danger float-right">Delete user</a>
              </div>

            </div>

          @endforeach
        @else
          <p>No other users</p>
        @endif

      </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
          <h4 class="header-title">Register a new user</h4>

          <form action="/administrator/administrators-manager" autocomplete="off" method="post">
            @csrf
            <input type="hidden" name="action" value="register">

            <div class="form-group">
              <label for="email">Email:</label>
              <input class="form-control" type="text" name="email" value="" placeholder="Email..." maxlength="300" required>
            </div>

            <div class="form-group">
              <label for="password">Password:</label>
              <input class="form-control" type="password" name="password" value="" placeholder="Password..." maxlength="300" required>
            </div>

            <br>

            <div class="submit-btn-area">
                <button name="submit" class="btn btn-primary" type="submit">Register</button>
            </div>

          </form>

        </div>
      </div>

      <div class="card mt-4">
          <div class="card-body">
            <h4 class="header-title">Grant administrator privileges for account</h4>

            <form action="/administrator/administrators-manager" autocomplete="off" method="post">
              @csrf
              <input type="hidden" name="action" value="make-administrator">

              <div class="form-group">
                <label for="password">Email:</label>
                <input class="form-control" type="text" name="email" placeholder="Email..." maxlength="300" required>
              </div>

              <div class="submit-btn-area">
                  <button name="submit" class="btn btn-primary" type="submit">Grant</button>
              </div>

            </form>

          </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
              <h4 class="header-title">Revoke administrator privileges for account</h4>

              <form action="/administrator/administrators-manager" autocomplete="off" method="post">
                @csrf
                <input type="hidden" name="action" value="revoke-administrator">

                <div class="form-group">
                  <label for="password">Email:</label>
                  <input class="form-control" type="text" name="email" placeholder="Email..." maxlength="300" required>
                </div>

                <div class="submit-btn-area">
                    <button name="submit" class="btn btn-primary" type="submit">Revoke</button>
                </div>

              </form>

            </div>
          </div>

        <div class="card mt-4">
            <div class="card-body">
              <h4 class="header-title">Change password for the logged account</h4>

              <form action="/administrator/administrators-manager" autocomplete="off" method="post">
                @csrf
                <input type="hidden" name="action" value="change-password">

                <div class="form-group">
                  <label for="password">Password:</label>
                  <input class="form-control" type="password" name="password" value="" placeholder="Password..." maxlength="300" required>
                </div>

                <div class="form-group">
                  <label for="repeat-password">Repeat password:</label>
                  <input class="form-control" type="password" name="repeat-password" value="" placeholder="Repeat password..." maxlength="300" required>
                </div>

                <div class="submit-btn-area">
                    <button name="submit" class="btn btn-primary" type="submit">Change</button>
                </div>

              </form>

            </div>
          </div>
</div>


@endsection
