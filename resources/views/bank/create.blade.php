<div class="content" id="createFormBank" style="display: none;">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Bank
            <button class="btn btn-primary pull-right" id="backViewBank">
              Kembali
            </button>
          </h4>
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" id="createData">
             {{ csrf_field() }}

            <br>
            <div class="form-group">
              <label class="control-label">Nomor Rekening</label>
              <input type="number" class="form-control border-input" placeholder="Nomor Rekening" name="number" required>
            </div>

            <div class="form-group">
              <label class="control-label">Nama Bank</label>
              <select name="master_bank_id" class="form-control border-input pilihBank" required>
                <option>Pilih Bank</option>
              </select>
            </div>

            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

            <div class="form-group">
              <button class="btn btn-success" type="submit">Save</button>
            </div>

          </form>
          </div>
      </div>
    </div>
  </div>
</div>