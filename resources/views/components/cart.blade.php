<form method="POST" action="{{ route('cart.store') }}">

    {{ csrf_field() }}

    <input type="hidden" name="dish_id" value="{{ $id }}">

    <button class="js-add-to-cart btn btn-info btn-block">
    Add to cart
    </button>
</form>
