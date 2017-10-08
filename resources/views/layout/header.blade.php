<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="/about">О проекте</a></li>
            {{--<li role="presentation" class="active"><a href="/">Главная</a></li>--}}
            {{--<li role="presentation"><a href="/types/">Типы криптовалют</a></li>--}}
            {{--<li role="presentation"><a href="/api_sources/">Список доступных Api</a></li>--}}
        </ul>
    </nav>
    <div class="select_api_block">
        <form action="/" method="POST">
            <label for="select_api">Выберите Api</label>
            <select id="select_api" name="selected_api" ng-model="api_id">
                <option value="1">coincap</option>
                <option value="2">coinmarketcap</option>
            </select>
        </form>
    </div>
</div>
<div class="page-header">
    @yield('pageTitle')
</div>