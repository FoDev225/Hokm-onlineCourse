<div>

	@if($message = Session::get('success'))

	<div class="alert alert-success alert-block">

		<button type="button" class="close" data-dismiss="alert">x</button>

		<i class="icon fa fa-check"></i> {{ $message }}

	</div>

	@endif

	@if($message = Session::get('error'))

	<div class="alert alert-danger alert-block">

		<button type="button" class="close" data-dismiss="alert">x</button>

		<i class="icon fa fa-ban"></i> {{ $message }}

	</div>

	@endif

</div>