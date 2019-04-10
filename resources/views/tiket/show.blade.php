@extends('layouts.admin')
@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#editan' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
  $('.image').dropify();
</script>
@endsection
@section('content')
<div class="content">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Event
            <button class="btn btn-primary pull-right" id="backViewUser">
              Kembali
            </button>
          </h4>
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" id="createData">

            <br>
            <div class="form-group">
              <label class="control-label">Title</label>
              <input type="text" class="form-control border-input" placeholder="Title Event" name="title" id="title" required>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea name="desc" id="editan"></textarea>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="control-label">Image</label>
                  <input type="file" name="image" id="image" class="image" data-height="300" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">Category</label>
                <select class="form-control border-input" name="category_id" required>
                  
                </select>
              </div>

               <div class="form-group">
                <label class="control-label">Harga</label>
                <input type="text" class="form-control border-input" placeholder="Harga" name="harga_limit" required>
              </div>

              <div class="form-group">
                <label class="control-label">User</label>
                <select class="form-control border-input" name="user_id" required>
                  
                </select>
              </div>

              <div class="form-group">
                <button class="btn btn-primary" type="submit">Save</button>
              </div>

            </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection