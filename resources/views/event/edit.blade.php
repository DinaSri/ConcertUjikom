<div class="content EventEdit" id="EventEdit" style="display: none;">
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
            <form enctype="multipart/form-data" class="FormEdit">
            {{ csrf_field() }}
            <br>

            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <label class="control-label">Title</label>
              <input type="text" class="form-control border-input" placeholder="Title Donasi" name="title" id="title" required>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea name="desc" id="desc" class="form-control border-input"></textarea>
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
              <label class="control-label">Status</label>
              <input type="string" class="form-control border-input" placeholder="Status" name="status" id="status" required>
            </div>

            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>

            </form>
          </div>
      </div>
    </div>
  </div>
</div>