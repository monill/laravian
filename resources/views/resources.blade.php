@extends('layouts.main')

@section('content')

    <div id="background">
        <div id="headerBar"></div>
        <div id="bodyWrapper">

            @include('partials.navbar')

            <div id="center">
                <a id="ingameManual" href="help.php">
                    <img class="question" alt="Help" src="{{ Vite::asset('resources/images/x.gif') }}">
                </a>

                <div id="sidebarBeforeContent" class="sidebar beforeContent">
                    @include('partials.hero-side')
                    @include('partials.alliance')
{{--                    @include('partials.infomsg')--}}
                    @include('partials.links')
                    <div class="clear"></div>
                </div>
                <div id="contentOuterContainer">
{{--                    @include('partials.res')--}}
                    <div class="contentTitle">
                        <a id="closeContentButton" class="contentTitleButton" href="/resources"></a>
                    </div>
                    <div class="contentContainer">
                        <div id="content" class="village1">
                            <map name="rx" id="rx">
                                @foreach($buildings as $building)
                                    <area id="BuildStatus{{ $building['id'] }}" href="{{ url('build', ['id' => $building['id']]) }}" coords="{{ $building['coords'] }}" shape="circle" title="Wait..." />
{{--                                    <script>--}}
{{--                                        window.addEvent('domready', function () {--}}
{{--                                            let element = document.getElementById('BuildStatus{{ $building['id'] }}');--}}
{{--                                            if (!element) {--}}
{{--                                                return;--}}
{{--                                            }--}}
{{--                                            let fnbuildTitle = function () {--}}
{{--                                                element.removeEventListener('mouseover', fnbuildTitle);--}}
{{--                                                Travian.ajax({--}}
{{--                                                    data: {--}}
{{--                                                        cmd: 'getFieldStatus',--}}
{{--                                                        data: {--}}
{{--                                                            id: {{ $building['id'] }}--}}
{{--                                                        }--}}
{{--                                                    },--}}
{{--                                                    onSuccess: function (data) {--}}
{{--                                                        element.setTitle(data.getFieldStatus);--}}
{{--                                                    }--}}
{{--                                                });--}}
{{--                                            };--}}
{{--                                            element.addEventListener('mouseover', fnbuildTitle);--}}
{{--                                        });--}}
{{--                                    </script>--}}
                                @endforeach
                                <area href="dorf2.php" coords="250,191,32" shape="circle" title="Village Center">
                            </map>
                            <div id="village_map" class="f<?php //echo $village->type; ?>">
                                <div id="village_circles"></div>
{{--                                @foreach ($buildings as $building)--}}
{{--                                    @php--}}
{{--                                        $levelClass = $building['level'] != 0 ? 'notNow' : 'good';--}}
{{--                                        $gidClass = //"gid{$village->resarray['f' . $building['id'] . 't']}";--}}
{{--                                        $constructionClass = $building['underConstruction'] ? 'underConstruction' : '';--}}
{{--                                        $classes = "level colorLayer $levelClass $gidClass level{$building['level']} {$building['maxLevelClass']} $constructionClass";--}}
{{--                                    @endphp--}}

{{--                                    <div class="{{ $classes }}" style="{{ $building['coords'] }}">--}}
{{--                                        <div class="labelLayer">{{ $building['level'] }}</div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
                                <img id="resfeld" usemap="#rx" src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
                            </div>
                            <div id="map_details">
{{--                                @include('partials.movement')--}}
                                @include('partials.production')
                                @include('partials.troops')
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sidebarAfterContent" class="sidebar afterContent">
{{--                    @include('partials.sideinfo')--}}
                    @include('partials.multivillage')
{{--                    @include('partials.quest')--}}
                </div>
                <div class="clear"></div>
            </div>
            @include('partials.footer')
        </div>
        <div id="ce"></div>
    </div>


    <script type="text/javascript">
        window.addEvent('domready', function () {
            Travian.Game.Layout.goldButtonAnimation();
        });
    </script>
    <script type="text/javascript">
        $$('#outOfGame li.logout a').addEvent('click', function () {
            Travian.WindowManager.getWindows().each(function ($dialog) {
                Travian.WindowManager.unregister($dialog);
            });
        });
    </script>

@endsection

