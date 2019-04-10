<div class="content TiketEdit" id="TiketEdit" style="display: none;">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Tiket
            <button class="btn btn-primary pull-right" id="backViewTiket">
              Kembali
            </button>
          </h4>
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" class="FormEdit">
             {{ csrf_field() }}
            <br>

            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <label class="control-label">Harga</label>
              <input type="text" class="form-control border-input" placeholder="Harga" name="harga" id="harga" required>
            </div>

            <div class="form-group">
              <label class="control-label">Stok</label>
           <input type="text" class="form-control border-input" placeholder="Stok" name="stok" id="stok" required>
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