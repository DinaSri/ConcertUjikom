<div class="content editmasterbank" id="editmasterbank" style="display: none">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Master Bank
            <button class="btn btn-primary pull-right">
              Kembali
            </button>
          </h4>
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" class="Form">
            {{ csrf_field() }}

            <br>

            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <label class="control-label">Nama Bank</label>
              <input type="text" class="form-control border-input" placeholder="Nama Bank" name="name" id="name" required>
            </div>

            <div class="form-group">
              <button class="btn btn-success" type="submit">Save</button>
            </div>

          </form>
          </div>
      </div>
    </div>
  </div>
</div>