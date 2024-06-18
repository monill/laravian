<div class="boxes villageList units">
    <div class="boxes-contents cf">
        <table id="troops" cellpadding="1" cellspacing="1">
            <thead>
            <tr>
                <th colspan="3">
                    Army:
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse ($units as $tid => $tnum)
                @if ($tid == 'hero')
                    <tr>
                        <td class="ico">
{{--                            <a href="{{ route('build', ['id' => 39]) }}">--}}
                                <img class="unit uhero" src="/assets/images/x.gif" alt="{{ __('U0') }}" title="{{ __('U0') }}" />
                            </a>
                        </td>
                        <td class="num">{{ $tnum }}</td>
                        <td class="un">{{ __('U0') }}</td>
                    </tr>
                @else
                    @php
                        $tname = $technology->unarray[$tid];
                    @endphp
                    <tr>
                        <td class="ico">
{{--                            <a href="{{ route('build', ['id' => 39]) }}">--}}
                                <img class="unit u{{ $tid }}" src="/assets/images/x.gif" alt="{{ $tname }}" title="{{ $tname }}" />
                            </a>
                        </td>
                        <td class="num">{{ $tnum }}</td>
                        <td class="un">{{ $tname }}</td>
                    </tr>
                @endif
            @empty
                <tr><td>Any:</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
