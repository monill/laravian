<div class="boxes villageList production">
    <div class="boxes-tl"></div>
    <div class="boxes-tr"></div>
    <div class="boxes-tc"></div>
    <div class="boxes-ml"></div>
    <div class="boxes-mr"></div>
    <div class="boxes-mc"></div>
    <div class="boxes-bl"></div>
    <div class="boxes-br"></div>
    <div class="boxes-bc"></div>
    <div class="boxes-contents cf">
        <table id="production" cellpadding="1" cellspacing="1">
            <thead>
                <tr>
                    <th colspan="4">Products per hour:</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="ico">
                        <div>
                            <img class="r1Big" src="{{ Vite::asset('resources/images/x.gif') }}" alt="Wood" title="Wood" />
                            @if(auth()->user()->b1)
                                <img src="{{ Vite::asset('resources/images/x.gif') }}" class="productionBoost" alt="Increase wood production">
                            @endif
                        </div>
                    </td>
                    <td class="res">Wood:</td>
{{--                    <td class="num"><?= $village->getProd('wood'); ?></td>--}}
                </tr>
                <tr>
                    <td class="ico">
                        <div>
                            <img class="r2Big" src="{{ Vite::asset('resources/images/x.gif') }}" alt="Clay" title="Clay" />
                            @if(auth()->user()->b2)
                                <img src="{{ Vite::asset('resources/images/x.gif') }}" class="productionBoost" alt="Increased clay production">
                            @endif
                        </div>
                    </td>
                    <td class="res">Clay:</td>
{{--                    <td class="num"><?= $village->getProd('clay'); ?></td>--}}
                </tr>
                <tr>
                    <td class="ico">
                        <div>
                            <img class="r3Big" src="{{ Vite::asset('resources/images/x.gif') }}" alt="Iron" title="Iron" />
                            @if(auth()->user()->b3)
                                <img src="{{ Vite::asset('resources/images/x.gif') }}" class="productionBoost" alt="Increase iron production">
                            @endif
                        </div>
                    </td>
                    <td class="res">Iron:</td>
{{--                    <td class="num"><?= $village->getProd('iron'); ?></td>--}}
                </tr>
                <tr>
                    <td class="ico">
                        <div>
                            <img class="r4Big" src="{{ Vite::asset('resources/images/x.gif') }}" alt="Crop" title="Crop" />
                            @if(auth()->user()->b4)
                                <img src="{{ Vite::asset('resources/images/x.gif') }}" class="productionBoost" alt="Increase crop production">
                            @endif
                        </div>
                    </td>
                    <td class="res">Crop:</td>
{{--                    <td class="num"><?= $village->getProd("crop"); ?></td>--}}
                </tr>
            </tbody>
        </table>

        <div>
            <button type="button" value="&nbsp;25%&nbsp;" id="button5229e52541034" class="gold productionBoostButton" title="Learn more about increasing productivity">
                <div class="button-container addHoverClick">
                    <div class="button-background">
                        <div class="buttonStart">
                            <div class="buttonEnd">
                                <div class="buttonMiddle"></div>
                            </div>
                        </div>
                    </div>
                    <div class="button-content">&#8206;&#8237;+&#8237;25&#8236;%&#8236;&#8206;</div>
                </div>
            </button>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    if ($('button5229e52541034')) {
                        $('button5229e52541034').addEvent('click', function() {
                            window.fireEvent('buttonClicked', [this, {
                                "type": "button",
                                "value": "Learn more about increasing productivity",
                                "name": "",
                                "id": "button5229e52541034",
                                "class": "gold productionBoostButton",
                                "title": "Learn more about increasing productivity",
                                "confirm": "",
                                "onclick": "",
                                "productionBoostDialog": {
                                    "infoIcon": "#"
                                }
                            }]);
                        });
                    }
                });
            </script>
        </div>
        <!--
        <button type="button" value="Mass Upgrade Resources" class="gold" title="Master Upgrade Resources" onclick="location.href='dorf1.php?masterbuild'">
            <div class="button-container addHoverClick">
                <div class="button-background">
                    <div class="buttonStart">
                        <div class="buttonEnd">
                            <div class="buttonMiddle"></div>
                        </div>
                    </div>
                </div>
                <div class="button-content">Mass Upgrade Resources</div>
            </div>
        </button>
        -->
    </div>
</div>
