<div id="sidebarBoxAlliance" class="sidebarBox">
    <div class="sidebarBoxBaseBox">
        <div class="baseBox baseBoxTop">
            <div class="baseBox baseBoxBottom">
                <div class="baseBox baseBoxCenter"></div>
            </div>
        </div>
    </div>
    <div class="sidebarBoxInnerBox">
        <div class="innerBox header">
            <button type="button" id="button5225ee283d5ac" class="layoutButton embassyWhite green {{ $allianceInfo == null ? 'disabled' : '' }}" onclick="return false;" title="Auction || Loading... Build Alliance.">
                <div class="button-container addHoverClick">
                    <img src="/assets/images/x.gif" alt="">
                </div>
            </button>

            <script type="text/javascript">
                window.addEvent('domready', function() {
                    var button = $('button5225ee283d5ac');
                    if (button) {
                        var titleFunction = function() {
                            button.removeEvent('mouseenter', titleFunction);
                            Travian.Game.Layout.loadLayoutButtonTitle(button, 'alliance', 'embassyWhite');
                        };
                        button.addEvent('mouseenter', titleFunction);
                    }
                });

                if ($('button5225ee283d5ac')) {
                    $('button5225ee283d5ac').addEvent('click', function() {
                        window.fireEvent('buttonClicked', [this, {
                            "type": "green",
                            "onclick": "return false;",
                            "loadTitle": true,
                            "boxId": "alliance",
                            "disabled": true,
                            "speechBubble": "",
                            "class": "",
                            "id": "button5225ee283d5ac",
                            "redirectUrl": "build.php?id=18",
                            "redirectUrlExternal": ""
                        }]);
                    });
                }
            </script>

            <button type="button" id="button5225ee283d789" class="layoutButton allianceForumWhite green {{ $allianceInfo == null ? 'disabled' : '' }}" onclick="return false;" title="Check Alliance || {{ $allianceInfo == null ? "You're not in alliance" : $allianceInfo['tag'] }}">
                <div class="button-container addHoverClick">
                    <img src="/assets/images/x.gif" alt="">
                </div>
            </button>

            <script type="text/javascript">
                if ($('button5225ee283d789')) {
                    $('button5225ee283d789').addEvent('click', function() {
                        window.fireEvent('buttonClicked', [this, {
                            "type": "green",
                            "onclick": "return false;",
                            "loadTitle": false,
                            "boxId": "",
                            "disabled": true,
                            "speechBubble": "",
                            "class": "",
                            "id": "button5225ee283d789",
                            "redirectUrl": "{{ $allianceInfo > 0 ?? 'allianz.php?s=2' }}",
                            "redirectUrlExternal": ""
                        }]);
                    });
                }
            </script>
            <button type="button" id="button5225ee283d8f8" class="layoutButton overviewWhite green {{ $allianceInfo == null ? 'disabled' : '' }}" onclick="return false;" title="Check Alliance || {{ $allianceInfo == null ? "'You're not in alliance'" : $allianceInfo['tag'] }}">
                <div class="button-container addHoverClick">
                    <img src="/assets/images/x.gif" alt="">
                </div>
            </button>

            <script type="text/javascript">
                if ($('button5225ee283d8f8')) {
                    $('button5225ee283d8f8').addEvent('click', function() {
                        window.fireEvent('buttonClicked', [this, {
                            "type": "green",
                            "onclick": "return false;",
                            "loadTitle": false,
                            "boxId": "alliance",
                            "disabled": true,
                            "speechBubble": "",
                            "class": "",
                            "id": "button5225ee283d8f8",
                            "redirectUrl": "{{ $allianceInfo > 0 ?? 'allianz.php' }}",
                            "redirectUrlExternal": ""
                        }]);
                    });
                }
            </script>
            <div class="clear"></div>

            <div class="boxTitle">
                @if($allianceInfo)
                    <a class="signLink" href="allianz.php" title="Alliance {{ $allianceInfo['tag'] }}">
                        <span class="wrap">{{ $allianceInfo['tag'] }}</span>
                    </a>
                    <a href="allianz.php?s=2" class="crest" title="Alliance Forum">
                        <img src="/assets/images/x.gif">
                    </a>
                @else
                    <p>You're not in alliance</p>
                @endif
            </div>
        </div>
        <div class="innerBox content"></div>
        <div class="innerBox footer"></div>
    </div>
</div>
