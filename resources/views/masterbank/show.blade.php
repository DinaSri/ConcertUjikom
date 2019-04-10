@extends('layouts.admin')
@section('content')
<div class="content">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Master Bank
            <button class="btn btn-primary pull-right"  id="backViewMasterBank">
              Kembali
            </button>
          </h4>
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data">

            <br>
            <div class="form-group">
              <label class="control-label">Nama Bank</label>
              <input type="text" class="form-control border-input" placeholder="Nama Bank" name="name" id="name" required>
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