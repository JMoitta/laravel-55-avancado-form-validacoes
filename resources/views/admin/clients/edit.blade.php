@extends('layouts.layout')

@section('content')
    <h3>Novo cliente</h3>
    @include('form._form_errors')
    <form method="POST" action="{{ route('clients.update', ['client' => $client->id]) }}">
        {{ method_field('PUT')}}
        @include('admin.clients._form')
        <button type="submit" class="btn btn-default">Salvar</button>
    </form>
@endsection