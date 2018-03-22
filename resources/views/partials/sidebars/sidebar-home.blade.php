<li class="{{ set_active('rooms') }}">
	<a href="{{ route('rooms') }}">
		<i class="fa fa-list-alt text-green"></i> <span>Turmas</span>
	</a>
</li>

@if (Auth::user()->is_admin)
	<li class="header">ADMINISTRADOR</li>
	<li class="{{ set_active('users') }}">
		<a href="{{ route('users') }}">
			<i class="fa fa-users text-green"></i> <span>Usuários</span>
		</a>
	</li>
	<li class="{{ set_active('roles') }}">
		<a href="{{ route('roles') }}">
			<i class="fa fa-unlock-alt text-green"></i> <span>Tipos e Permições</span>
		</a>
	</li>
@endif
