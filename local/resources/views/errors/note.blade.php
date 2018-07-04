@if(Session::has('error'))
    <div class=" err text-center">
        <p class="alert alert-danger">{{Session::get('error')}}</p>
    </div>
@endif
@foreach($errors->all() as $error)
    <div class=" err text-center">
        <p class="alert alert-danger">{{$error}}</p>
    </div>
@endforeach
<script>
    $('.err').delay(2000).slideUp(300);
</script>