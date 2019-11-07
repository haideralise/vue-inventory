@extends('layouts.app')
<script type="text/javascript">
    window.vuebnb_listing_model = "{!! addslashes(json_encode($model)) !!}";
</script>
@section('content')
<div class="container">
    <bnb-component></bnb-component>
</div>
@endsection
