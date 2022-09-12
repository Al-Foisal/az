@extends('frontend.master')
@section('body')

<div class="mt-5 mb-5 container">
@if(!empty($setting->privacy))
 {!!$setting->privacy!!}
@endif
</div>
 @endsection