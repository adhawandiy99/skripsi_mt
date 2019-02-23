@extends('layout')
@section('title')
	User
@endsection
@section('header')
	<a href="/teknisi"><button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-arrow-left"></span>Kembali</button></a> User
@endsection
@section('css')
	<style type="text/css">
		.no-search .select2-search {
		    display:none
		}
	</style>
@endsection
@section('content')
	<form class="form-horizontal" method="post">
	  <div class="form-group form-group-lg">
	    <label for="Username" class="col-md-3 control-label">ID User</label>
	    <div class="col-md-9">
	      <input type="text" name="Username" class="form-control" id="Username" placeholder="Username" value="{{ isset($data->Username) ? $data->Username : ''}}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Password" class="col-md-3 control-label">Password</label>
	    <div class="col-md-9">
	      <input type="Password" name="Password" class="form-control" id="Password" placeholder="Password">
	      <small class="text-muted">Please do not use too weak password.</small>
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Nama" class="col-md-3 control-label">Nama</label>
	    <div class="col-md-9">
	      <input type="text" name="Nama" class="form-control" id="Nama" placeholder="Nama" value="{{ isset($data->Nama) ? $data->Nama : '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Level" class="col-md-3 control-label">Profile</label>
	    <div class="col-md-9">
	      <input type="text" name="Level" class="form-control" id="Level" placeholder="Level" value="{{ isset($data->Level) ? $data->Level : '' }}" >
	    </div>
	  </div>
    <div class="form-group">
	    <div class="col-md-offset-3 col-md-9">
	      <button type="submit" class="btn"><span class="btn-label-icon left fa fa-database"></span>Submit</button>
	    </div>
	  </div>
	</form>

    
	</form>
@endsection
@section('js')
<script type="text/javascript">
  $(function() {
    $('#level').select2({
      placeholder: 'Select',
      dropdownCssClass : 'no-search',
      data: [{"id":"1","text":"Admin"},{"id":"2","text":"Teknisi"}],
      multiple:false
    });
	});
	
</script>
@endsection