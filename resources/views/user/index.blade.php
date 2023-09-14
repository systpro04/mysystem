@extends('layouts.admin')

@section('content')

@include('user.modal-create')

@if(auth()->check())
    <?php auth()->user()->update(['last_activity' => now()]); ?>
@endif

<style>
    span i{
        position: relative;
        left:-10px;
        top: -8px;
    }
    .img-td{
        position: relative;
    }
    .act{
        position: relative;
        right: 0.7rem;
    }
</style>

<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr>
    </div>




    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h1 class="card-title">USERS</h1>
                            </div>

                            
                            <div class="col-4 text-right">
                                
                                <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createUserModal"><i class="fas fa-plus"></i></a>
                                <button id="delete-selected" name="selected_users[]" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body" >
                        <div class="table-full-width table-responsive">
                            <table class="table table-bordered table-striped shadow text-center">
                                <thead class=" bg-dark text-light">
                                    <th scope="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="select-all" name="selected_users[]">
                                            <label class="form-check-label" for="select-all">
                                           
                                            </label>
                                        </div>
                                       
                                    </th>
                                    <th scope="col">Avatar</th>
                                    
                                    <th scope="col">
                                        <a href="{{ route('users.index', ['sortField' => 'name', 'sortOrder' => $sortField === 'name' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                            Name
                                            @if ($sortField === 'name')
                                                @if ($sortOrder === 'asc')
                                                    <i class="fas fa-sort-up"></i>
                                                @else
                                                    <i class="fas fa-sort-down"></i>
                                                @endif
                                            @endif
                                        </a>
                                    </th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                      
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="selected_users[]" value="{{ $user->id }}">
                                            </div>
                                        </td>
                                        <td>
                                            @if($user->image)
                                                <img src="{{ asset('../images/users/' . $user->image) }}" alt="Image" style="height: 40px; width: 40px; border-radius: 50%">
                                            @else
                                                <img src="{{ asset('../images/users/default.png') }}" alt="Default Image" style="height: 40px; width: 40px; border-radius: 50%">
                                            @endif

                                            <span>
                                                @if ($user->last_activity && (now()->diffInMinutes($user->last_activity) < 120))
                                                    <span class="text-success"><i class="fas fa-circle"></i></span>
                                                @else
                                                    <span class="text-danger"><i class="fas fa-circle"></i></span>
                                                @endif
                                                @if ($user->last_activity && (now()->diffInMinutes($user->last_activity) < 10))
                                                     <br><small class="text-success act">Active</small>
                                                    @elseif ($user->logout_time)
                                                        <br><small>Active {{ Carbon\Carbon::parse($user->logout_time)->diffForHumans() }}</small>
                                                    @endif
                                            </span>

                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</td>
                                       
                                        <td>
                                            <a href="{{route('users.show', $user)}}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-folder"></i>
                                            </a>

                                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUserModal{{$user->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form id="delete-form-{{ $user->id }}"
                                                action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="deleteUser({{ $user->id }})" type="button"
                                                    data-placement="bottom" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>

                                            </form>
                                        </td>
                                    </tr>
                                    @include('user.modal-edit')
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="card-footer py-4">
                                <div class="d-flex justify-content-center">
                                    {{ $users->links() }}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteUser(id){
        Swal.fire({
            title: 'Are you sure?',
            text: 'You Want to delete this?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed'
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
            })
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Select all checkbox
    $('#select-all').click(function(){
        $('input[name="selected_users[]"]').prop('checked', this.checked);
    });

    // Individual checkbox
    $('input[name="selected_users[]"]').click(function(){
        if(!$(this).prop("checked")){
            $('#select-all').prop("checked",false);
        }
    });
</script>

<script>
    function deleteSelected() {
    var selected = $('input[name="selected_users[]"]:checked').map(function(){
        return this.value;
    }).get();

    if(selected.length > 0){
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete selected items?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ url("deleteSelected") }}',
                    type: 'POST',
                    data: {
                        selected_users: selected,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Deleted Successfully',
                            icon: 'success',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        }).then((result) => {
                            location.reload();
                        });
                    },

                    error: function (xhr) {
                        Swal.fire({
                            title: 'Error in Deleting Selected Users',
                            icon: 'error',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                });
            }
        });
    } else {
        Swal.fire({
            title: 'Select atleast one user to delete',
            icon: 'error',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    }
}

$('#delete-selected').click(function(){
    deleteSelected();
});
</script>
@endsection