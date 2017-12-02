<li class="{{ set_active('rooms') }}">
	<a href="{{ route('rooms') }}">
		<i class="fa fa-list-alt"></i> <span>Turmas</span>
	</a>
</li>

@if (Auth::user()->is_admin)
	<li class="header">ADMINISTRADOR</li>
	<li class="{{ set_active('users') }}">
		<a href="{{ route('users') }}">
			<i class="fa fa-users"></i> <span>Usuários</span>
		</a>
	</li>
@endif


