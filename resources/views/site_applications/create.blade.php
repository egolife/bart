@extends('layouts.app')

@section('content')
    <form action="{{ route('site-applications.store') }}" class="form-horizontal" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label col-sm-2 col-sm-offset-2" for="email">Почтовый адрес</label>
            <div class="col-sm-6">
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2 col-sm-offset-2" for="message">Сообщение</label>
            <div class="col-sm-6">
                <textarea name="message" id="message" rows="5" class="form-control">{{ old('message') }}</textarea>
                <span class="help-block">Не более {{ $message_max_length }} символов</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 col-sm-offset-4">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-sm-offset-4">
            @if($previous_application)
                <p class="text-info">
                    Вашему предыдущему сообщению присвоен номер {{ $previous_application->id }}.<br>
                    В случае отправки повторного сообщения предыдущее будет удалено!
                </p>
            @endif
        </div>
    </div>

    @if($errors->count())
        <div class="row">
            <ul class="col-sm-offset-2">
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@stop