@extends('user.layouts.app')

@section('title','Ubah Password Berhasil')

@section('content')

@push('addon-style')
<style>
	.footer{display: none;}
</style>
@endpush

<div class="container justify-content-center mt-4">
	<hr>
	<div class="col-lg-6 ml-auto mr-auto">
		<div class="card shadow ml-auto mr-auto">
			<div class="card-body">
				<div class="text-center mb-3">
					<h3 class="bg-success">PASSWORD BERHASIL DIUBAH</h3>
				</div>
				<a href="{{route::('beranda')}}" class="btn btn-danger btn-block">kembali</a>
			</div>
		</div>
	</div>

</div>

@endsection