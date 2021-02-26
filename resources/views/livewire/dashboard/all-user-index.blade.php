<div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            @foreach($roles as $role)
                                <a href="{{ route('all-users', ['roles' => $role]) }}"
                                    class="btn btn-sm btn-outline-secondary mr-1 {{ request('roles') == $role ? 'active' : '' }}">
                                    {{ $role }}
                                </a>
                                @endforeach
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1 mb-2">
                                    <select id="fetch-list" wire:model="limit" class="form-control">
                                        <option>10</option>
                                        <option>25</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <input type="search" class="form-control" wire:model="searchKeyword" placeholder="eg: John Doe" />
                                </div>
                            </div>
                            <table id="livewire-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>Email</th>
                                        <th>Events</th>
                                        <th>Status</th>
                                        <th>Roles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allUsers as $user)
                                        <tr>
                                            <td>
                                                <img src="{{ $user->profile_photo_url }}"
                                                    alt="{{ $user->full_name }}" class="img-size-50 img-circle mr-3">
                                                <span
                                                    class="text-sm">{{ $user->name ?? '' }}</span>
                                            </td>
                                            <td>{{ $user->email ?? '' }}</td>

                                            <td>{{ $user->bookingevents->count() }}</td>

                                            <td>
                                                <input data-id="{{ $user->id }}" class="toggle-class" type="checkbox"
                                                    data-onstyle="info" data-style="ios" data-offstyle="warning"
                                                    data-toggle="toggle" data-on="Active" data-size="small"
                                                    data-off="Block"
                                                    {{ $user->isActive ? 'checked' : '' }}>
                                            </td>

                                            <td>
                                                @forelse($user->getRoleNames() as $rolename)
                                                    <label
                                                        class="badge badge-success">{{ $rolename ?? '' }}</label>
                                                @empty
                                                    <label>{{ 'No Roles Available' }}</label>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="7">
                                                {{ 'No data available' }}
                                            </td>
                                        </tr>

                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-2 float-right">
                                {{ $allUsers->links() }}
                            </div>
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
</div>
