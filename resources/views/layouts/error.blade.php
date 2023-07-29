@extends('layouts.app')
@section('title', 'Ошибка')
@section('content')

    <div class="alert alert-danger">
        {{ $errorMessage }}
    </div>

@endsection
