@extends("layouts.master")
@section("title","Houzeo app")

@section('content')

<div class="container  wrap-cont" id="app">
    {{-- people componet --}}
    <div class="row">
        <div class="col-12">
            <people-component ref="people"></people-component>
        </div>
    </div>
    {{--  clearfix--}}
    <div class="clearfix"></div>
    {{--  movie component--}}
    <div class="row">
        <div class="col-12">
            <movies-component ref="people"></movies-component>
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
