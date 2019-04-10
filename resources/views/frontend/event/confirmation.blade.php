@extends('layouts.front')
@section('scripts')
<script>
</script>
@endsection
@section('content')
<div class="hero-content">
      
    </div><!-- .hero-content -->

    <div class="content-section">
<div class="section" id="createFormTransfer">
  <div class="container">

      <div class="card">
        <div class="header">
        </div>
          <div class="container-fluid">

          	<br>
          	<center>
          		<h4>
          			Terima kasih Telah Berkunjung ke Eventku <br>
          		</h4>
              Atas Nama
              <h4>
                {{ Auth::user()->name }}
              </h4>
              Silahkan kirim ke nomor rekening berikut
              <h4>
              1501200215012020
              </h4>
              <br>
	      			Untuk melihat lebih detail, silahkan kunjungi di user profile dan kunjungi kami lagi 
              <br><br>
          	</center>

            <center>
	            <div class="form-group">
                <button class="btn btn-primary" onclick="window.location='{{ url('event/layout') }}'">Kembali</button>
                <button class="btn btn-primary" onclick="window.location='{{ url('/profile') }}'">Profile</button>
	            </div>
            </center>

          </form>
       
      </div>
    </div>
  </div>
</div>

<style>
  .card{
    
  border-style: solid;
  border-top-color: indigo;
  }
</style>
@endsection