<form method="POST" action="{{ $url }}">
	{{ csrf_field() }}
	{{ method_field('DELETE') }} 
	<button class="btn btn-danger btn-block">DELETE</button>
</form>	
