@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
      <div class="col-md-12">
         @component('components.back', ['url' => route('dishes.index')])
         @endcomponent
        <hr>
      </div>
    </div>

    <div class="row">
        @component('components.dish', ['dish' => $dish,
                                       'classes' => '',
                                       'showBtn' => TRUE]) 
        @endcomponent
    </div>
</div>
@endsection



