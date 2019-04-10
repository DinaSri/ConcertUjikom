<div class="content UserEdit" id="UserEdit" style="display: none">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">User
            <button class="btn btn-primary pull-right" id="backViewUser">
              Kembali
            </button>
          </h4>
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" class="myFormEdit">

           {{ csrf_field() }}

            <br>



            <div class="form-group">
              <label class="control-label">Nama</label>
              <input type="text" class="form-control border-input" placeholder="Nama" name="name" id="name" required>
            </div>

            <div class="form-group">
              <label class="control-label">Email</label>
              <input type="email" class="form-control border-input" placeholder="Email" name="email" id="email" required>
            </div>

            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="password" class="form-control border-input" placeholder="Password" name="password" id="password" required>
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