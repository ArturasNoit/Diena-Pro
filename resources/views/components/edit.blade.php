@if(Auth::check())

	@if(Auth::user()->isAdmin())

		<a href="{{ $url }}"
		   class="btn btn-success btn-block">
			Edit
		</a>

	@endif

@endif