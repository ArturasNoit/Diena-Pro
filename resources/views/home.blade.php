@extends('layouts.app')

@section('content')
<!-- Place somewhere in the <body> of your page -->
<div class="flexslider">
  <ul class="slides">
  @foreach($dishes as $dish)
    <li>
      <img src="{{ $dish->image_url}}" />
    </li>
    @endforeach
  </ul>
</div>

</script>
@endsection
