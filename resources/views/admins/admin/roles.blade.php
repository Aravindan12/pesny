@extends('admins.includes.app')

@section('content')
@include('admins.layouts.navbar')
@include ('admins.layouts.sidebar')

@include ('admins.layouts.right_sidebar')

<!-- Side-bar ends -->
<br><br>
      <!-- main-panel satrts -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#createRoleModal">Add Role<i class="fa-solid fa-circle-plus p-2 fa-3x"></i></button>
                </div>
            </div>
        </div>

        <!-- Add role -->
        <div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="createRoleModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createRoleModal">Add Role</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.add_new_role') }}" method="post">
                            @csrf
                        <div class="form-group">
                            <label>New Role</label>
                            <input type="text" name="new_role" class="form-control"  />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



          <!-- Roles  -->
        <div class="col-md-12" style="display:inline-block;">
            <div class="row">
                @foreach($roles as $role)

                    <div class="col-md-4 p-1 thumbnail roles_card_all">
                        <div class="card card-dark-blue">
                            <div class="card-body roles_card_heading">
                            <div class="row col-md-12">
                                <h3 class="col-md-6">{{ $role->name }} </h3>
                            </div>
                            <div class="roles_card roles_down_arrow">
                                @foreach($role_has_permissions as $permission)
                                    @if($role->id == $permission->role_id)
                                        <p class="">{{ $permission->permission_name }}</p>
                                    @endif
                                @endforeach
                                <button type="button" class="btn bg-transparent add_remove_permission_for_role" data-bs-toggle="modal" data-bs-target="#removePermissionsForRole-{{$role->id}}" style="color:white;margin-top:-20px">Add/Remove Permissions<i class="fa-solid fa-circle-plus p-2 fa-3x"><input type="hidden" value="{{$role->id}}" name="roles_card_id_remove"></i></button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal to remove permission for role -->
                    <div class="modal fade" id="removePermissionsForRole-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="removePermissionsForRole-{{$role->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="removePermissionsForRole-{{$role->id}}">Add/Remove Permission</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.remove_permission_to_role')}}" method="post">
                                        @csrf
                                    <div class="form-group append_added_permissions">
                                        <input type="hidden" name="role_id" value="{{$role->id}}" class="form-control"  />

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

      </div>
      <script src="{{ asset('js/admin/roles-and-permissions.js') }}"></script>

@endsection
