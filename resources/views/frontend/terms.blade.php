@extends('frontend.master')
@section('body')
<div class="mt-5 mb-5 container">
@if(!empty($setting->terms))
 {!!$setting->terms!!}
@endif
</div>

@endsection