@extends('layouts.master')

@section('content')

  <h3>{{ Auth::user()->username }}</h3>

@endsection
