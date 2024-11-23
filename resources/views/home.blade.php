@extends('layouts.app')

@section('content')
<div class="row">
    {{ auth()->user()->userType }}
</div>
@endsection
