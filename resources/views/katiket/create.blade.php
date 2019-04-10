<div class="content" id="createFormKatiket" style="display: none;">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Category Tickets
            <button class="btn btn-primary pull-right" id="backViewKatiket">
              Kembali
            </button>
          </h4>
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" id="createData">
              {{ csrf_field() }}

            <br>
           

            <div class="form-group">
              <label class="control-label">Nama Kategori</label>
              <input type="text" class="form-control border-input" placeholder="Nama Kategori Ticket" name="name" id="name" required>
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
