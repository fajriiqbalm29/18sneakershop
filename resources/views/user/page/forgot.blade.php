@extends('user.layouts.app')

@section('title','Checkout')

@section('content')

@push('addon-style')
<style>
	.hero{
		display: none;
	}

	.header{
		display: none;
	}
	.footer{
		display: none;
	}
</style>

<div class="container justify-content-center mt-4">
	<h4>Forgot Password</h4>
	<hr>
	<div class="col-lg-6 ml-auto mr-auto">
		<div class="card shadow ml-auto mr-auto">
			<form action="{{route('cekemail')}}" method="get">
			<div class="card-body">
				<div class="form-group">
					<label>Email</label>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
					  </div>
					  <input type="text" class="form-control" name="cekemail" placeholder="Masukan email" aria-label="Username" aria-describedby="basic-addon1">
					</div>
				</div>
				<button type="submit" class="btn btn-danger float-right">Submit</button>
			</div>
			</form>
		</div>
	</div>

</div>

@endsection