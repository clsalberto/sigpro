@extends('layouts.app')

@section('title', 'Erro 500')

@section('body')

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="error-page">
				<h2 class="headline text-red">500</h2>
				<div class="error-content" style="padding-top: 18px">
					<h3>
						<i class="fa fa-warning text-red"></i>
						Oops! {{ $exception->getMessage() }}
					</h3>
					<p>
						Trabalharemos para consertar isso imediatamente.
						Enquanto isso, você pode <a href="{{ route('home') }}">retornar a página principal</a>.
					</p>
				</div>
			</div>

        </section>
        <!-- /.content -->

@endsection