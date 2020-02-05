@extends("layouts.master")
@section("title","Houzeo app")

@section('content')

<div class="container  wrap-cont" id="app">
    {{-- people componet --}}
    
    <div class="row">
        <div class="col-12">
            <people-in-movie-component ref="people"></people-in-movie-component>
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
