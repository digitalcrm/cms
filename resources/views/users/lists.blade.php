@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add Users</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
            @foreach ($roles as $role)
            <a
                href="{{ route('all-users',['roles'=> $role]) }}"
                class="btn btn-sm btn-outline-secondary mr-1 {{ request('roles') == $role ? 'active' : '' }}">
                {{ $role }}
            </a>

            @endforeach
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Roles</th>
                </tr>
                </thead>
                <tbody>
                @forelse($allUsers as $user)
                <tr>
                  <td>{{ $user->name ?? '' }}</td>
                  <td>{{ $user->email ?? '' }}</td>
                  <td>
                      @forelse($user->getRoleNames() as $rolename)
                          <label class="badge badge-success">{{ $rolename ?? ''}}</label>
                      @empty
                        <label>{{'No Roles Available'}}</label>
                      @endforelse
                  </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="7">
                        {{("No data available")}}
                    </td>
                </tr>

                @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
@endsection
