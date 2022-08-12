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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPermissionModal">Add Permission<i class="fa-solid fa-circle-plus p-2 fa-3x"></i></button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createPermissionModal" tabindex="-1" role="dialog" aria-labelledby="createPermissionModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPermissionModal">Add Permission</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.add_new_permission') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>New Permission</label>
                                <input type="text" name="new_permission" class="form-control"  />
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
          
        <div class="col-md-12" style="display:inline-block;">
        <div class="row">
          @foreach($permissions as $permission)
            
            <div class="col-md-4 p-1 thumbnail">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="">{{ $permission->name }}</p>
                  <input type="text" value="{{$permission->id}}" id="persmissions_card_id">
                  <div class="persmissions_card{{$permission->id}}">
                    <p class="">{{ $permission->name }}</p>
                    <p class="">{{ $permission->name }}</p>
                    <p class="">{{ $permission->name }}</p>
                    <p class="">{{ $permission->name }}</p>
                    <p class="">{{ $permission->name }}</p>
                  </div>
                  <i class="fa-solid fa-angles-down fa-2x permission_down_arrow" style="width:15px;"></i>
                </div>
              </div>
            </div>

          @endforeach
        </div>
        </div>
          
      </div>
      <script src="{{ asset('js/admin/script.js') }}"></script>
    
@endsection