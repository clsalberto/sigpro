@extends('layouts.app')

@section('title', 'Erro 404')

@section('body')

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="error-page">
				<h2 class="headline text-yellow">404</h2>
				<div class="error-content" style="padding-top: 18px">
					<h3>
						<i class="fa fa-warning text-yellow"></i>
						Oops! Página não encontrada.
					</h3>
					<p>
						Não conseguimos encontrar a página que estava procurando.
						Você pode <a href="{{ route('home') }}">retornar a página principal</a>.
					</p>
				</div>
			</div>

        </section>
        <!-- /.content -->

@endsection