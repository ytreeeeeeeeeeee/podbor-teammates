@extends('layout')

@section('title', 'Чат')

@section('page-content')
    <h2 class="title">Чат</h2>
    <div id="chat" data-chats="{{json_encode($chats_info)}}" data-user="{{json_encode($user_id)}}" class="chat-container"></div>
@endsection

@section('scripts')
    @vite(['entry' => 'resources/js/components/chatIndex.jsx'])
@endsection
