<div class="flex-row mt-3 vertical-middle">
    @php
    $a = explode('/', request()->url());
    $tag = end($a);
    @endphp
    <a href="@if($tag === 'dossier') # @else dossier @endif" class="tabs-contain @if($tag === 'dossier') tabs-contain-active @endif color-white pt-2 pb-2 pl-3 pr-3 pointer first-tab">
        Досье
    </a>
    @if(in_array(\App\Branch::getParentId($ISN), \App\User::getMotivationDepartments()) && (!in_array(\App\Branch::getParentId($ISN),["3994433", "3994439", "3436136"])))
        @if((new \App\User())->checkMotivationPermission($ISN))
            <a href="@if($tag === 'motivation') # @else motivation @endif" class="tabs-contain @if($tag === 'motivation') tabs-contain-active @endif color-white pointer pt-2 pb-2 pl-3 pr-3">
                Мотивация
            </a>
            <a href="@if($tag === 'rating') # @else rating @endif" class="tabs-contain @if($tag === 'rating') tabs-contain-active @endif color-white pt-2 pb-2 pl-3 pr-3 pointer">
                Рейтинг
            </a>
            <a href="@if($tag === 'report') # @else report @endif" class="tabs-contain @if($tag === 'report') tabs-contain-active @endif color-white pt-2 pb-2 pl-3 pr-3 pointer last-tab">
                Отчет
            </a>
        @endif
    @endif
    <a href="@if($tag === 'centcoins') # @else centcoins @endif" class="tabs-contain @if($tag === 'centcoins') tabs-contain-active @endif color-white pt-2 pb-2 pl-3 pr-3 pointer first-tab">
        Сенткоины
    </a>
</div>