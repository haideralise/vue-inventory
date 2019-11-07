
@extends('layouts.app')
<script type="text/javascript">
    window.vendors = JSON.parse("{!! addslashes(json_encode($vendors)) !!}");
</script>
@section('content')
    <div class="container">
        <vendor-list></vendor-list>
    </div>
@endsection
