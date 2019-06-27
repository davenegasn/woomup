<aside class="col-md-3" style="padding-left: 0;">
    <div class="sidebar-container">
        <h1>Acciones</h1>
        <ul>
            <li>
                <a href="{{ action('MatchController@index') }}">Matches</a>
            </li>
            <li>
                <a href="{{ action('GirlsController@index') }}">Usuarias</a>
            </li>
            <li>
                <a href="{{ action('RolesController@index') }}">Roles</a>
            </li>
            <li>
                <a href="{{ action('CompanyController@index') }}">Empresas</a>
            </li>
            <li>
                <a href="{{ action('MatchTypeController@index') }}">Tipos de match</a>
            </li>
            
        </ul>
    </div>
</aside>