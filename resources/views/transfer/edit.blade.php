<div class="content TransferEdit" id="TransferEdit" style="display: none;">
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
            <form enctype="multipart/form-data" class="myFormEdit">
            {{ csrf_field() }}

            <br>

            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <label class="control-label">Nominal</label>
              <input type="number" class="form-control border-input" placeholder="Rp. " name="nominal" id="nominal" readonly>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea name="desc" id="desc" class="form-control border-input" readonly></textarea>
            </div>

            <div class="form-group">
              <button class="btn btn-success" type="submit">Verify</button>
            </div>

          </form>
          </div>
      </div>
    </div>
  </div>
</div>