<div id="sidebarBoxHero" class="sidebarBox toggleable expanded">
    <div class="sidebarBoxBaseBox">
        <div class="baseBox baseBoxTop">
            <div class="baseBox baseBoxBottom">
                <div class="baseBox baseBoxCenter"></div>
            </div>
        </div>
    </div>
    <div class="sidebarBoxInnerBox">
        <div class="innerBox header ">
            <button id="heroImageButton" onclick="window.location.href='hero/inventory';" class="heroImageButton " type="button" title="View Hero || {{ $hero['status'] }}">
                <img src="hero/image?uid={{ auth()->user()->id }}&amp;size=sideinfo&amp;{{ $hero['hero']->hash }}" class="heroImage" />
            </button>
            @if($hero['hero']->points > 0)
            <div class="bigSpeechBubble levelUp" title="Hero Scores || Click!">
                <img src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
            </div>
            @endif
            @if($hero['dead'])
            <div class="bigSpeechBubble dead" title="The hero is not alive">
                <img src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
            </div>
            @endif
            <div class="playerName">
                <img src="{{ Vite::asset('resources/images/x.gif') }}" class="nation nation{{ auth()->user()->tribe_id }}">
                {{ auth()->user()->username }}
            </div>
            <button type="button" id="button5225ee283b159" class="layoutButton auctionWhite green" onclick="return false;">
                <div class="button-container addHoverClick">
                    <img src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
                </div>
            </button>
            <button type="button" id="button5225ee283b28a" class="layoutButton adventureWhite green" onclick="return false;">
                <div class="button-container addHoverClick">
                    <img src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
                </div>
                <div class="speechBubbleContainer ">
                    <div class="speechBubbleBackground">
                        <div class="start">
                            <div class="end">
                                <div class="middle"></div>
                            </div>
                        </div>
                    </div>
                    <div class="speechBubbleContent">
                        {{ $hero['adventure'] }}
                    </div>
                </div>
                <div class="clear"></div>
            </button>
        </div>
        <div class="innerBox content">
            <div class="heroStatusMessage">
                <img class="heroStatus{{ $hero['image'] }}" src="{{ Vite::asset('resources/images/x.gif') }}" alt="The hero is completely healthy">
                {{ $hero['status'] }}
            </div>
            <div class="progressBars">
                <div class="heroHealthBarBox alive" title="Health{{ $hero['hero']->health }}%">
                    <img class="injury" src="/assets/images/x.gif" alt="Health">
                    <div class="bar" style="width:{{ $hero['hero']->health }}%; background-color: {{ $hero['color'] }}">&nbsp;</div>
                </div>
                <div class="heroXpBarBox" title="Experience: {{ $hero['hero']->experience }}%">
                    <img src="/assets/images/x.gif" class="iExperience" alt="Experience">
                    <div class="bar" style="width: {{ $hero['heroXP'] }}%;"></div>
                </div>
            </div>
        </div>
        <div class="innerBox footer">
            <button type="button" class="toggle" onclick="">
                <div class="button-container addHoverClick"></div>
            </button>
        </div>
    </div>
</div>

{{--<script>--}}
{{--    window.addEvent('domready', function() {--}}
{{--        const button = $('button5225ee283b159');--}}
{{--        if (button) {--}}
{{--            const titleFunction = function () {--}}
{{--                button.removeEvent('mouseenter', titleFunction);--}}
{{--                Travian.Game.Layout.loadLayoutButtonTitle(button, 'hero', 'auctionWhite');--}}
{{--            };--}}
{{--            button.addEvent('mouseenter', titleFunction);--}}
{{--        }--}}
{{--    });--}}

{{--    if ($('button5225ee283b159')) {--}}
{{--        $('button5225ee283b159').addEvent('click', function() {--}}
{{--            window.fireEvent('buttonClicked', [this, {--}}
{{--                "type": "green",--}}
{{--                "onclick": "return false;",--}}
{{--                "loadTitle": true,--}}
{{--                "boxId": "hero",--}}
{{--                "disabled": false,--}}
{{--                "speechBubble": "",--}}
{{--                "class": "",--}}
{{--                "id": "button5225ee283b159",--}}
{{--                "redirectUrl": "hero/auction",--}}
{{--                "redirectUrlExternal": ""--}}
{{--            }]);--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}

{{--<script>--}}
{{--    window.addEvent('domready', function() {--}}
{{--        const button = $('button5225ee283b28a');--}}
{{--        if (button) {--}}
{{--            const titleFunction = function () {--}}
{{--                button.removeEvent('mouseenter', titleFunction);--}}
{{--                Travian.Game.Layout.loadLayoutButtonTitle(button, 'hero', 'adventureWhite');--}}
{{--            };--}}
{{--            button.addEvent('mouseenter', titleFunction);--}}
{{--        }--}}
{{--    });--}}
{{--    if ($('button5225ee283b28a')) {--}}
{{--        $('button5225ee283b28a').addEvent('click', function() {--}}
{{--            window.fireEvent('buttonClicked', [this, {--}}
{{--                "type": "green",--}}
{{--                "onclick": "return false;",--}}
{{--                "loadTitle": true,--}}
{{--                "boxId": "hero",--}}
{{--                "disabled": false,--}}
{{--                "speechBubble": "5",--}}
{{--                "class": "",--}}
{{--                "id": "button5225ee283b28a",--}}
{{--                "redirectUrl": "hero/adventure",--}}
{{--                "redirectUrlExternal": ""--}}
{{--            }]);--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}

{{--<script>--}}
{{--    window.addEvent('domready', function() {--}}
{{--        Travian.Translation.add({--}}
{{--            'hero_collapsed': 'Show more information',--}}
{{--            'hero_expanded': 'Hide'--}}
{{--        });--}}

{{--        const box = $('sidebarBoxHero');--}}
{{--        box.down('button.toggle').addEvent('click', function(e) {--}}
{{--            Travian.Game.Layout.toggleBox(box, 'travian_toggle', 'hero');--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
