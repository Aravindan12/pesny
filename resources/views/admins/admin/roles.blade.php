@extends('admins.includes.app')

@section('content')
    
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

                  <input type="hidden" value="{{$role->id}}" id="roles_card_id">
                  <div class="roles_card roles_down_arrow">
                      @foreach($role_has_permissions as $permission)
                          @if($role->id == $permission->permission_id)
                          <p class="">{{ $permission->permission_name }}</p>
                          @endif
                      @endforeach
                    
                    
                    <button type="button" class="btn bg-transparent col-md-" data-bs-toggle="modal" data-bs-target="#listPermissionsForRole-{{$role->id}}" style="color:white;margin-top:-20px">Add Permissions<i class="fa-solid fa-circle-plus p-2 fa-3x"></i></button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal to give permission for role -->
            <div class="modal fade" id="listPermissionsForRole-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="listPermissionsForRole-{{$role->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="listPermissionsForRole-{{$role->id}}">Give Permission</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.add_permission_to_role')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <input type="hidden" name="role_id" value="{{$role->id}}" class="form-control"  />

                            @foreach($permissions as $permission)
                              
                            <h5><input type="checkbox" name="permission_id[]" class="form-check-input" value="{{$permission->id}}"
                            @foreach($role_has_permissions as $role_has_permission) @if($permission->id == $role_has_permission->permission_id) checked @endif @endforeach>{{$permission->name}}</h5>
                            <br />

                            @endforeach
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
      <script src="{{ asset('js/admin/script.js') }}"></script>
    
@endsection