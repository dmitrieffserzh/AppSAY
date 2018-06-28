<div class="post">
    <h1>Редактирование профиля</h1>
    <hr>
    <form class="form-horizontal" method="POST" action="{{ route('users.profile.update', $user->profile->id) }}">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Имя</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $user->profile->name }}" placeholder="Юлия">

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="col-md-6 {{ $errors->has('surname') ? ' has-error' : '' }}">
                <label for="surname">Фамилия</label>
                <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->profile->surname }}" placeholder="Иванова">

                @if ($errors->has('surname'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
<hr>
        <div class="form-group">
            <div class="col-md-6 {{ $errors->has('city') ? ' has-error' : '' }}">
                <label for="name">Город</label>
                <input id="city" type="text" class="form-control" name="city" value="{{ $user->profile->city }}" placeholder="Москва">

                @if ($errors->has('city'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="surname">Номер телефона</label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->profile->phone }}" placeholder="+7 (ХХХ) ХХХ-ХХ-ХХ">

                @if ($errors->has('phone'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
<hr>
        <div class="form-group">
            <div class="col-md-12 {{ $errors->has('about_user') ? ' has-error' : '' }}">
                <label for="name">Дополнительная информация</label>
                <textarea id="about_user" type="text" class="form-control" name="about_user" rows="10" placeholder="Коротко о себе...">{{ $user->profile->about_user }}</textarea>
                @if ($errors->has('about_user'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('about_user') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                    Сохранить изменения
                </button>
            </div>
        </div>
    </form>
</div>