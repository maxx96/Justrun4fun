@if(count($errors) > 0)
@foreach($errors->all() as $error)
  <div class="warning-block-profile warning-block-login">
    <div class="text-block-warning">{{$error}}</div>
  </div>
  @endforeach
@endif
