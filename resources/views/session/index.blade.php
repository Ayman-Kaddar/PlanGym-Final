@extends('theme.base')

@section('content')

    @extends(($user == "client") ? 'session.person.client_index' : 'session.person.trainer_index')

@endsection
