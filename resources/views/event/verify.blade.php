<div class="content EventVerify" id="EventVerify" style="display: none;">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Donation
            <button class="btn btn-primary pull-right" id="backViewUser">
              Kembali
            </button>
          </h4>
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" class="myFormVerify">
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

             <input type="hidden" name="category_id" id="category_id">

                 <input type="hidden" name="user_id" id="user_id">



            {{-- <div class="form-group">
              <label class="control-label">Image</label>
              @if(isset($asd) && $asd->image)
                <input type="file" name="image" class="dropify" data-height="300" data-default-file="{{ asset }}">
              @endif
            </div> --}}


            <div class="form-group">
                <label class="control-label">Image</label>
                <input type="text" name="image" id="image" class="dropify" data-height="300" />
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

