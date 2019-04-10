<div class="content" id="createFormEvent" style="display: none;">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Event
            <button class="btn btn-primary pull-right" id="backViewEvent">
              Kembali
            </button>
          </h4>
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" id="createData">
              {{ csrf_field() }}

            <br>

            <div class="form-group">
              <label class="control-label">Title</label>
              <input type="text" class="form-control border-input" placeholder="Title Event" name="title" id="title" required>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea name="desc" class="form-control border-input"></textarea>
            </div>

            <div class="form-group">
              <label class="control-label">Penyelanggara</label>
              <input type="text" class="form-control border-input" placeholder="Diselenggarakan Oleh" name="penyelenggara" id="penyelenggara" required>
            </div>

             <div class="form-group">
              <label class="control-label">Tanggal</label>
              <input type="date" class="form-control border-input" placeholder="Tanggal" name="tanggal" id="tanggal" required>
            </div>

              <div class="form-group">
              <label class="control-label">Waktu</label>
              <input type="time" class="form-control border-input" placeholder="Waktu" name="waktu" id="waktu" required>
            </div>

              <div class="form-group">
              <label class="control-label">Lokasi</label>
              <input type="text" class="form-control border-input" placeholder="Lokasi" name="lokasi" id="lokasi" required>
            </div>

            <div class="form-group">
                <label class="control-label">Image</label>
                <input type="file" name="image" id="image" class="image" data-height="300" />
            </div>

            <div class="form-group">
              <label class="control-label">Category</label>
              <select class="form-control border-input" name="category_id" id="pilihCategory" required>
              </select>
            </div>

            


           <input type="hidden" value="Belum Terverifikasi" name="status" id="status">

                   <input type=hidden name="user_id" id="user_id" value="{{ Auth::user()->id }}">

            <div class="form-group">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>

            </form>
          </div>
      </div>
    </div>
  </div>
</div>
