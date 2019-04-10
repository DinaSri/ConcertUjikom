<div class="content BankEdit" id="BankEdit" style="display: none;">
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
            <form enctype="multipart/form-data" class="FormEdit">
             {{ csrf_field() }}

            <br>

            <input type="hidden" name="id" id="id">

            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">Nomor Rekening</label>
                <input type="number" class="form-control border-input" placeholder="Nomor Rekening" name="number" id="number" required>
              </div>

              <input type="hidden" name="user_id" id="user_id">

              <div class="form-group">
                <button class="btn btn-success" type="submit">Save</button>
              </div>
            </div>

          </form>
          </div>
      </div>
    </div>
  </div>
</div>