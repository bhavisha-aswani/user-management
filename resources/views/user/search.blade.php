@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/mycss.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>User Records</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('user.create') }}" data-toggle="modal" data-target="#exampleModal"> Create New</a>
        </div>
        @include('user.create')
    </div>
</div>

<!-- table for showing records-->
<table class="table table-hover">
   <thead>
    <tr>
      <th scope="col">Avatar</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Experience</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      @if($users->isNotEmpty())
        @foreach($users as $user)
        <tr>
          <td><img src="{{ asset('/storage/image/'.$user->image) }}" alt="no img" title="" class="rounded-circle" height="50px" width="50px"></td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            {{ \Carbon\Carbon::parse($user->joining_date)->diff(\Carbon\Carbon::parse($user->leaving_date))->format('%y years, %m months and %d days')}}
          </td>
          <td>
          <a data-id="{{$user->id}}" data-toggle="modal" data-target="#exampleModal-delete">
          <i class="fa fa-close" style="font-size:20px;color:red;">Remove</i>
          </a>
        </td>
        </tr>
       @endforeach 

        @else
      <tr>
          <td>
            <h2>No user found</h2>
        </td>
      </tr>
  @endif
  </tbody>
</table>


<!-- Modal for Delete User-->
<div class="modal fade left" id="exampleModal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-lg modal-right" role="document">
      <div class="modal-content">
        <div class="modal-header" style="">
            <h5 class="modal-title" id="exampleModalLabel">
              Delete User
            </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form action="{{route('user.destroy','id')}}" method="post">
            @csrf 
            @method('DELETE') 
          <div class="form-group">
            <input type="hidden" id="id" name="id">
            <h5 class="text-center">Are you sure You want to Delete......?????</h5>
            </div>
            <div class="modal-footer">
                 <button type="submit" class="btn btn-success">Yes</button>
                 <button type="button" class="btn btn-info" data-dismiss="modal">close</button>
            </div>
          </form>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
 $('#exampleModal-delete').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)

    modal.find('.modal-title').text('Delete user');
    modal.find('.modal-body #id').val(id);
  });
</script>
@endsection
<!--end-->
