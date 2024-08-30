
@extends('my-layouts.my-app') 
@section('title', 'Primer View')
@section('content')
    @parent
    <ul>
    @foreach($messages as $message)
        <li>{{$message[0]}}</li>
    @endforeach
    </ul>

    {{$texto}}<br />
    The current UNIX timestamp is {{ time() }}.

    @{{ name }}

    @verbatim
    <div class="container">
        Hello, {{ name }}.
    </div>
    @endverbatim
    <div>
        @if (count($records) === 1)
        I have one record!
        @elseif (count($records) > 1)
        I have multiple records!
        @else
        I don't have any records!
        @endif
    </div>
    <div>
        @unless (Auth::check())
        You are not signed in.
        @endunless
    </div>
    <div>
        @auth
        Autenticado
        @else
        No autenticado
        @endauth
    </div>
    <div>
        @env(['staging', 'production'])
        The application is running in "staging" or "production"...
        @else
        The application is not running in "staging" or "production"...
        @endenv
    </div>

    @for ($i = 0; $i
    < 10; $i++)
        The current value is {{ $i }} <br />
    @endfor
    foreach: <br />
    @foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
    @endforeach
    Forelse: <br />
    @forelse ($users as $user)
    <li>{{ $user->name }}</li>
    @empty
    <p>No users</p>
    @endforelse
    <div>
        Div del comentario
        {{-- comentario que no se muestra --}}
    </div>
    @php
    $isActive = false;
    $hasError = true;
    @endphp

    <span @class([ 'p-4' , 'font-bold'=> $isActive,
        'text-gray-500' => ! $isActive,
        'bg-red' => $hasError,
        ])>texto</span>

    <span class="p-4 text-gray-500 bg-red"></span>
    <form method="post">

        <input type="checkbox"
            name="active"
            value="active"
            @checked(old('active', true)) />
        <input type="email" name="email" placeholder="email"/>
        <select name="user">
            @foreach ($users as $user)
            <option value="{{ $user->id }}" @selected(old('user')==$user->id)>
                {{ $user->id }} - {{ $user->name }}
            </option>
            @endforeach
        </select>
        <input type="submit" />
    </form>

    <div>
    @include('mis-views.otra-view', ['status' => 'complete'])
    </div>
    @foreach ($users as $user)
    @if ($loop->first)
        This is the first iteration.
    @endif
 
    @if ($loop->last)
        This is the last iteration.
    @endif
 
    <p>This is user {{ $user->id }}</p>
@endforeach

<p>This is appended to the master content.</p>
@endsection