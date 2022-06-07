@extends('theme.base')

@section('content')

    @extends(($role == "client") ? 'session.person.client_index' : 'session.person.trainer_index')

@endsection
