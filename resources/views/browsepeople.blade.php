@extends("layouts.master")
@section("title","Houzeo app")

@section('content')

<div class="container  wrap-cont" id="app">
    {{-- people componet --}}
    <div class="row">
        <div class="col-12">
            <list-people-component ref="people"></list-people-component>
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
