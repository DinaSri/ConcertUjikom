@extends('layouts.admin')
@section('scripts')
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
          <h4 class="title">Bank
            <button class="btn btn-primary pull-right">
              Kembali
            </button>
          </h4>
        </div>
          <div class="container-fluid">
            <form enctype="multipart/data-form" id="createData">

            <br>
            <div class="col-md-6">
              <div class="form-group">
                  <label class="control-label">Image</label>
                  <input type="file" class="image" data-height="300" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">Nomor Rekening</label>
                <input type="number" class="form-control border-input" placeholder="Nomor Rekening" name="number" required>
              </div>

              <div class="form-group">
                <label class="control-label">Pemilik</label>
                <input type="text" class="form-control border-input" placeholder="Pemilik" name="owner" required>
              </div>

              <div class="form-group">
                <label class="control-label">Nama Bank</label>
                <select name="master_bank_id" class="form-control border-input" required>
                  <option>Pilih Bank</option>
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