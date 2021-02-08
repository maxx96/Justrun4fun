@if(count($errors) > 0)
@foreach($errors->all() as $error)
  <div class="warning-block warning-block-login">
    <div class="text-block-info">{{$error}}</div>
  </div>
  @endforeach
@endif
