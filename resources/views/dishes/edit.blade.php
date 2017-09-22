@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12">
         @component('components.back', ['url' => route('dishes.index')])
         @endcomponent
         <hr>
         @if(Session::has('update'))
          <div>
              <div class="alert alert-success alert-dismissable col-md-8 col-md-push-2">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <i class="fa fa-check" aria-hidden="true"></i>
               <em> {!! session('update') !!}</em>
          </div>
          </div>
         @endif
      </div>
   </div>
   <div class="row">
      <div class="col-md-8">
         <div class="panel panel-default">
            <div class="panel-heading">
               Edit Dish
            </div>
            <div class="panel-body">
               <form method="POST"
                     action="{{ route('dishes.update', $dish->id) }}" class="form-horizontal">

                  {{ csrf_field() }}
                  {{ method_field('PUT') }}

                  <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                     <label for="title" class="col-md-4 control-label">Title</label>
                     <div class="col-md-6"><input id="title" name="title" value="{{ old('title', $dish->title) }}"class="form-control" type="text">

                       @if ($errors->has('title'))
                           <span class="help-block">
                               <strong>{{ $errors->first('title') }}</strong>
                           </span>
                       @endif
                     </div>
                  </div>
                  <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                     <label for="description" class="col-md-4 control-label">Description</label>

                     <div class="col-md-6"><input id="description" name="description" value="{{ old('description', $dish->description)}}" class="form-control" type="text">
                       @if ($errors->has('description'))
                           <span class="help-block">
                               <strong>{{ $errors->first('description') }}</strong>
                           </span>
                       @endif
                     </div>
                  </div>
                  <div class="form-group {{ $errors->has('image_url') ? ' has-error' : '' }}">
                     <label for="image_url" class="col-md-4 control-label">Image pic</label>
                     <div class="col-md-6"><input id="image_url" name="image_url" value="{{ old('image_url', $dish->image_url)}}" class="form-control" type="text">
                       @if ($errors->has('image_url'))
                           <span class="help-block">
                               <strong>{{ $errors->first('image_url') }}</strong>
                           </span>
                       @endif
                     </div>
                  </div>
                  <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                     <label for="price" class="col-md-4 control-label">Price</label>
                     <div class="col-md-6"><input id="price" step="0.01" name="price" value="{{ old('price', $dish->price )}}" class="form-control" type="number">
                       @if ($errors->has('price'))
                           <span class="help-block">
                               <strong>{{ $errors->first('price') }}</strong>
                           </span>
                       @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-6 col-md-offset-4"><button type="submit" class="btn btn-primary">
                        Register
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
     @component('components.dish', ['dish' => $dish,
                                    'classes' => ' col-md-4',
                                    'showBtn' => FALSE])
     @endcomponent
   </div>
</div>
@endsection
