@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
      <div class="col-md-12">
         @component('components.create', ['url' => route('dishes.create')])
         @endcomponent
        <hr>
      </div>
    </div>

    <div class="row">
      @foreach ($dishes as $dish)
        @component('components.dish', ['dish' => $dish,
                                       'classes' => ' col-md-4',
                                       'showBtn' => TRUE]) 
        @endcomponent
      @endforeach
    </div>
</div>
@endsection