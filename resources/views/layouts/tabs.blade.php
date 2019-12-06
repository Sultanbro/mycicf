<div class="flex-row mt-3 vertical-middle">
    @php
    $a = explode('/', request()->url());
    $tag = end($a);
    @endphp
    <a href="dossier" class="tabs-contain @if($tag === 'dossier') tabs-contain-active @endif color-white pt-2 pb-2 pl-3 pr-3 pointer first-tab">
        Досье
    </a>
    <a href="motivation" class="tabs-contain @if($tag === 'motivation') tabs-contain-active @endif color-white pointer pt-2 pb-2 pl-3 pr-3">
        Мотивация
    </a>
    <a href="rating" class="tabs-contain @if($tag === 'rating') tabs-contain-active @endif color-white pt-2 pb-2 pl-3 pr-3 pointer">
        Рейтинг
    </a>
    <a href="report" class="tabs-contain @if($tag === 'report') tabs-contain-active @endif color-white pt-2 pb-2 pl-3 pr-3 pointer last-tab">
        Отчет
    </a>
</div>