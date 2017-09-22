<ul class="list-group{{ $classes }}">

   <li class="list-group-item list-group-item-success">
     {{ $dish->title }}
  </li>

   <li class="list-group-item">
     <a href="{{ route('dishes.show', $dish->id) }}">
      <img src="{{ $dish->image_url }}" class="img-responsive">
     </a>
   </li>

   <li class="list-group-item height-fix">
     {{ str_limit($dish->description, 160) }}
   </li>

   <li class="list-group-item">
      Price: {{ $dish->price }} $
   </li>

   @if($showBtn)

     <p></p>

     @component('components.edit', 
               ['url' => route('dishes.edit', $dish->id )])
     @endcomponent

     <p></p>

     @component('components.delete', 
               ['url' => route('dishes.destroy', $dish->id )])
     @endcomponent 

     <p></p> 

     @component('components.cart', ['id' => $dish->id])
     @endcomponent 

   @endif
</ul>