<div id="sidebarBoxLinklist" class="sidebarBox   ">
    <div class="sidebarBoxBaseBox">
        <div class="baseBox baseBoxTop">
            <div class="baseBox baseBoxBottom">
                <div class="baseBox baseBoxCenter"></div>
            </div>
        </div>
    </div>
    <div class="sidebarBoxInnerBox">
        <div class="innerBox header ">
            <button type="button" id="button528bc9f5707f9"
                    class="layoutButton {{ !auth()->user()->plus ? 'editBlack gold' : 'editWhite green' }}"
                    onclick="return false;">
                <div class="button-container addHoverClick ">
                    <img src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
                </div>
            </button>

            @if(!auth()->user()->plus)
                <script type="text/javascript">
                    if ($('button528bc9f5707f9')) {
                        $('button528bc9f5707f9').addEvent('click', function () {
                            window.fireEvent('buttonClicked', [this, {
                                "type": "gold",
                                "onclick": "return false;",
                                "loadTitle": false,
                                "boxId": "",
                                "disabled": false,
                                "speechBubble": "",
                                "class": "",
                                "id": "button528bc9f5707f9",
                                "redirectUrl": "",
                                "redirectUrlExternal": "",
                                "plusDialog": {
                                    "featureKey": "linkList",
                                    "infoIcon": "#"
                                },
                                "title": "Link List || Travian Plus lets you insert links"
                            }]);
                        });
                    }
                </script>
            @else
                <script type="text/javascript">
                    if ($('button528bc9f5707f9')) {
                        $('button528bc9f5707f9').addEvent('click', function () {
                            window.fireEvent('buttonClicked', [this, {
                                "type": "green",
                                "onclick": "return false;",
                                "loadTitle": false,
                                "boxId": "",
                                "disabled": false,
                                "speechBubble": "",
                                "class": "",
                                "id": "button528bc9f5707f9",
                                "redirectUrl": "linklist.php",
                                "redirectUrlExternal": "",
                                "title": "Link List || Travian Plus lets you insert links"
                            }]);
                        });
                    }
                </script>
            @endif

            <div class="clear"></div>
            <div class="boxTitle">List of links</div>
        </div>
        <div class="innerBox content">
            @if(auth()->user()->plus)
                <div id="linkList" class="listing">
                    <div class="head">
                        <a href="spieler.php?s=2" accesskey="L">List of links</a>
                    </div>
                    <div class="list none">
                        @foreach($links as $link)
                            {{ $t = 1 }}
                            <ul>
                                <li class="entry">
                                    <div style="position: absolute; right: 4px; top: 1px;">{{ $t }}</div>
                                    <a href="{{ $link->url }}" title="{{ $link->name }}">
                                        {{ $link->name }}
                                    </a>
                                </li>
                            </ul>
                            {{ $t++ }}
                        @endforeach
                        <div class="pager">
                            <a href="#" class="back" style="display: none;"></a>
                            <a href="#" class="next" style="display: none;"></a>
                        </div>
                    </div>
                    <script type="text/javascript">
                        new Travian.Game.PageScroller({
                            elementPrev: $('linkList').down('a.back'),
                            elementNext: $('linkList').down('a.next'),
                            elementList: $('linkList').down('div.list'),
                            elementBackground: $('linkList').down('div.list')
                        });
                    </script>
                </div>
            @else
                <div class="linklistNotice">Travian Plus lets you insert links</div>
            @endif

        </div>
        <div class="innerBox footer"></div>
    </div>
</div>

@if($timestamp)
    <div id="sidebarBoxLinklist" class="sidebarBox">
        <div class="sidebarBoxBaseBox">
            <div class="baseBox baseBoxTop">
                <div class="baseBox baseBoxBottom">
                    <div class="baseBox baseBoxCenter"></div>
                </div>
            </div>
        </div>
        <div class="sidebarBoxInnerBox">
            <div class="innerBox header">
                <button type="button" id="button528bc9f5707f9" class="layoutButton {{ !auth()->user()->plus ? 'editBlack gold' : 'editWhite green' }}" onclick="return false;">
                    <div class="button-container addHoverClick">
                        <img src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
                    </div>
                </button>
                @if(!auth()->user()->plus)
                    <script type="text/javascript">
                        if ($('button528bc9f5707f9')) {
                            $('button528bc9f5707f9').addEvent('click', function () {
                                window.fireEvent('buttonClicked', [this, {
                                    "type": "gold",
                                    "onclick": "return false;",
                                    "loadTitle": false,
                                    "boxId": "",
                                    "disabled": false,
                                    "speechBubble": "",
                                    "class": "",
                                    "id": "button528bc9f5707f9",
                                    "redirectUrl": "",
                                    "redirectUrlExternal": "",
                                    "plusDialog": {
                                        "featureKey": "linkList",
                                        "infoIcon": "#"
                                    },
                                    "title": "Link List || Travian Plus lets you insert links"
                                }]);
                            });
                        }
                    </script>
                @else
                    <script type="text/javascript">
                        if ($('button528bc9f5707f9')) {
                            $('button528bc9f5707f9').addEvent('click', function () {
                                window.fireEvent('buttonClicked', [this, {
                                    "type": "green",
                                    "onclick": "return false;",
                                    "loadTitle": false,
                                    "boxId": "",
                                    "disabled": false,
                                    "speechBubble": "",
                                    "class": "",
                                    "id": "button528bc9f5707f9",
                                    "redirectUrl": "linklist.php",
                                    "redirectUrlExternal": "",
                                    "title": "Link List || Travian Plus lets you insert links"
                                }]);
                            });
                        }
                    </script>
                @endif
                <div class="clear"></div>
                <div class="boxTitle">List of links</div>
            </div>
            <div class="innerBox content">
                <tr>
                    <td colspan="2" class="count">
                        @php $delduration = max(round(259200 / setting('speed')), 3600) @endphp
                        @if($timestamp > time() + $delduration * 2 / 3)
                            <button type="button" value="del" class="icon" onclick="window.location.href='spieler.php?s=3&id={{ auth()->user()->id }}&a=1&e=4'; return false;">
                                <img src="{{ Vite::asset('resources/images/x.gif') }}" class="del" alt="del">
                            </button>
                        @endif
                        @php $timer = getTimeFormat($timestamp - time()) @endphp
                        Delete on <span id="timer {{ $timer }}">{{ $timer }}</span>
                    </td>
                </tr>
            </div>
            <div class="innerBox footer"></div>
        </div>
    </div>
@endif
