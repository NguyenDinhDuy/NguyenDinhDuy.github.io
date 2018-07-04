@if(Session::has('message'))
    <div class="mes text-center">
        <p class="alert alert-danger">{{Session::get('message')}}</p>
    </div>
@endif
<script>
    $('.mes').delay(2000).slideUp(300);
</script>
{{--@foreach($messages->all() as $message)--}}
{{--<p class="alert alert-danger">{{$message}}</p>--}}
{{--@endforeach--}}