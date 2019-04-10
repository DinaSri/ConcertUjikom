@extends('layouts.admin')
@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#editan' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
@section('content')
<div class="content">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Transfer
            <button class="btn btn-primary pull-right" id="backViewUser">
              Kembali
            </button>
          </h4>
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" id="createData">

            <br>
            <div class="form-group">
              <label class="control-label">Nominal</label>
              <input type="number" class="form-control border-input" placeholder="Rp. " name="nominal" id="nominal" required>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea name="desc" id="editan"></textarea>
            </div>

            <div class="form-group">
              <label class="control-label">User</label>
              <select class="form-control border-input" name="user_id" required="">
                
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Bank</label>
              <select class="form-control border-input" name="bank_id" required="">
                
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Judul Event</label>
              <select class="form-control border-input" name="event_id" required="">
                
              </select>
            </div>

            <div class="form-group">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>

          </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection