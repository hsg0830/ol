@if (count($errors) > 0)
  <ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <li class="ms-4 mb-2">{{ $error }}</li>
    @endforeach
  </ul>
@endif
