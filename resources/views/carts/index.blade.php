@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <h1>
        Cart ({{ cart_size(csrf_token()) }}) 
        </h1>
        <hr>

           @foreach($carts as $cart)
            <ul class="list-group">

                <li class="list-group-item list-group-item-success"> 
                    {{ $cart->dish->title }}
                </li>

                <li class="list-group-item clearfix">
                    <div class="col-md-2">
                        <a href="{{ route('dishes.show', $cart->dish_id) }}">
                            <img class="img-responsive"
                                 src="{{ $cart->dish->image_url }}">
                        </a>  
                    </div>
                    <div class="col-md-8">
                        {{ substr($cart->dish->description, 0, 250) }}
                        <br>
                        Price: <p class="label label-success">{{ $cart->dish->price }} $</p>
                    </div>
                    <div class="col-md-2">
                     @component('components.delete', 
                               ['url' => route('cart.destroy', $cart->id )])
                     @endcomponent 
                    </div>
                </li>
            <p></p>
            </ul>
            @endforeach
    </div>

    <div class="row">
        <h2>
        Sub-total: 
            <p class="label label-danger pull-right"> {{ $sub_total }} $</p>
        </h2>

        <h2>
        VAT: 
            <p class="label label-warning pull-right"> {{ $vat }} $</p>
        </h2>

        <h2>
        <strong>Total:</strong> 
            <p class="label label-success pull-right"> {{ cart_amount(csrf_token()) }} $</p>
        </h2>
    </div>

    <div class="row">

        <!-- 
            1. Jei nėra prekių, tai add something ir linkas į dishes puslapį

            2. Jeigu nesi prisijungęs, bet turi krepšelyje prekių, tai nukreipia į formą

            3. Jeigu esi prisijungęs ir turi krepšelyje prekių, tai nukeliauja į order linką

         -->

        @if(cart_size(csrf_token()) == 0)
        <a href="{{ route('dishes.index') }}" 
           class="btn btn-lg btn-success btn-block">
           Add something
        </a>
        @elseif(Auth::user() != TRUE && 
                cart_size(csrf_token()) > 0)
        <!-- a register -->
        <a href="{{ route('login') }}" 
           class="btn btn-lg btn-success btn-block">Checkout
        </a>
        @else
        <!-- form order -->
         <form method="POST" action="{{ route('orders.store') }}">
             {{ csrf_field() }}
                
             <button class="btn btn-lg btn-success btn-block">
                Checkout
             </button>
        </form>
        @endif
    </div>
    <hr>
</div>
@endsection
