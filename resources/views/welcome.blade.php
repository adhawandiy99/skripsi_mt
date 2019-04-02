@extends('layout')
@section('title')
  .: promon :.
@endsection
@section('header')
  SELAMAT DATANG DI APLIKASI<br>MAINTENANCE & PENGELOLAAN<br>JARINGAN OPTIK PADA PT. TELKOM AKSES
@endsection
@section('css')
  <style type="text/css">
    .no-search .select2-search {
        display:none
    }
  </style>
@endsection
@section('content')
  <div id="c3-bar" style="height: 250px"></div>
  <div class="row">
  <div class="col-sm-2" style="text-align: center;">
	  <div class="easy-pie-chart" data-percent="63">
	    <span></span>
	  </div>
	  <br>
	  <div class="label">Closed</div>
	</div>
  <div class="col-sm-2" style="text-align: center;">
	  <div class="easy-pie-chart" data-percent="15">
	    <span></span>
	  </div>
	  <br>
	  <div class="label">Pending</div>
	</div>
  <div class="col-sm-2" style="text-align: center;">
	  <div class="easy-pie-chart" data-percent="22">
	    <span></span>
	  </div>
	  <br>
	  <div class="label">Cancel</div>
	</div>
</div>
@endsection
@section('js')
	<script>
	  $(function() {
	    var data = {
	      columns: [
	        [ 'data1', 492, 118, 124, 332, 262, 182 ],
	        [ 'data2', 205, 138, 164, 474, 244, 216 ]
	      ],
	      type: 'bar',
	    };

	    c3.generate({
	      bindto: '#c3-bar',
	      color: { pattern: [ '#FF5722', '#4CAF50' ] },
	      data: data,
	      bar: {
	        width: { ratio: 0.5 },
	      },
	    });
	    $('.easy-pie-chart').easyPieChart({
	      animate: 1000,
	      size: 120,
	      onStep: function(_from, _to, currentValue) {
	        $(this.el).find('> span').text(Math.round(currentValue) + '%');
	      },
	    });
	  });
	</script>
@endsection