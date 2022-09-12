@extends('frontend.master')
@section('body')
@if(!empty($setting->mlogo))
    <link rel="shortcut icon" href="{{($setting->mlogo)}}">
    @endif
<div class="mt-5 mb-5 container">
@if(!empty($setting->about))
 {!!$setting->about!!}
@endif
</div>
@endsection