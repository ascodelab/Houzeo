@extends("layouts.master")
@section("title","Houzeo app")

@section('content')

<div class="container  wrap-cont" id="app">
    {{--  movie component--}}
    <div class="row">
        <div class="col-12">
            <list-movies-component ref="people"></list-movies-component>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
   $(document).ready( function () {
    
} );

</script>

@stop
