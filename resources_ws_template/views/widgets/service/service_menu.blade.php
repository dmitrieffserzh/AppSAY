<div class="component service-menu">
    <button class="service-menu__button" type="button" id="service-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="19" cy="12" r="1"></circle>
            <circle cx="5" cy="12" r="1"></circle>
        </svg>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="service-dropdown">
        @if( $content->owner->id == Auth::id() || Auth::user()->role == 'editor' || Auth::user()->is_admin())
        <a class="dropdown-item" href="#">Редактировать</a>
        <a class="ajax dropdown-item" href="#"
           data-toggle="modal"
           data-name="Пожаловаться"
           data-content="Ты серьезно хочешь удалить это говно?">Удалить</a>
            <div class="dropdown-divider"></div>
        @endif
        <a class="ajax dropdown-item" href="#"
           data-toggle="modal"
           data-name="Пожаловаться"
           data-content="<p>Эта хренотень реально нарушает Ваши авторские права или оскорбляет Вас?</p>"
           data-modal-size="modal-sm">Пожаловаться</a>
    </div>
</div>