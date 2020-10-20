<table>
    <thead>
    <tr>
        <th><b>Общее количество сенткойнов</b></th>
        <th><b>Сотрудник</b></th>
        <th><b>История начисления</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($centcoins as $centcoin)
        @if(isset($centcoin->branch->fullname))
            <tr>
                <td>{{ $centcoin->centcoins }}</td>
                <td>@if(isset($centcoin->branch->fullname)){{ $centcoin->branch->fullname }}@endif</td>
                <td>
                    @foreach($centcoin->fullInfo as $history)
                        @if($history->operation_type == 'add'){{ $history->description }} <br>@endif
                    @endforeach
                </td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>