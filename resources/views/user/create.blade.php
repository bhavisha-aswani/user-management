<!-- Modal for Add User-->
<div class="modal fade left" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-lg modal-right" role="document">
      <div class="modal-content">
        <div class="modal-header" style="">
            <h5 class="modal-title" id="exampleModalLabel">Add New Record
            </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
              <label>Email:</label>
              <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
              <label>Full name:</label>
              <input type="text" class="form-control" name="name" placeholder="Enter Full name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
              <label>Date of Joining:</label>
              <input type="date" class="form-control" name="joining_date" value="{{ old('joining_date') }}" required>
            </div>

            <div class="form-group">
              <label>Date of leaving:</label>
              <input type="date" name="leaving_date" id="leaving_date" onchange="disableStatus()" value="{{ old('leaving_date') }}" required>
              <label>Still working:</label>
              <input type="checkbox" name="status" id="status" onchange="disableLeavingDate()" required value="{{ old('status') }}">
            </div>

            <div class="form-group">
              <label for="Image">Upload Image:</label>
              <input type="file" class="form-control" name="image" required />
               @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
              @endif
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-info" data-dismiss="modal">close</button>
                 <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
    </div>
  </div>
</div>


<script type="text/javascript">
let status = 0;

   function disableStatus() {
       document.getElementById("status").disabled = true;
       document.getElementById("status").boolean = true;
    }

    function disableLeavingDate() {
        document.getElementById("status").disabled = false;
        document.getElementById("status").boolean = false;
        document.getElementById("leaving_date").disabled = true;
    }
</script>