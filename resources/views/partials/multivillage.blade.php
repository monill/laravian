<div id="sidebarBoxVillagelist" class="sidebarBox toggleable @if(isset($_COOKIE['travian_toggle'])) @foreach(explode(',', $_COOKIE['travian_toggle']) as $cs) @php $expl = explode(':', $cs); if ($expl[0] == "villagelist") { echo $expl[1]; } $i++; @endphp @endforeach @else collapsed @endif">
    <div class="sidebarBoxBaseBox">
        <div class="baseBox baseBoxTop">
            <div class="baseBox baseBoxBottom">
                <div class="baseBox baseBoxCenter"></div>
            </div>
        </div>
    </div>
    <div class="sidebarBoxInnerBox">
        <div class="innerBox header">
            <button type="button" id="button5229e52550643" class="layoutButton toggleCoordsWhite green  toggle" onclick="return false;" title="Show coordinates">
                <div class="button-container addHoverClick">
                    <img src="/assets/images/x.gif" alt="">
                </div>
            </button>
            <script type="text/javascript">
                if ($('button5229e52550643')) {
                    $('button5229e52550643').addEvent('click', function() {
                        window.fireEvent('buttonClicked', [this, {
                            "type": "green",
                            "onclick": "return false;",
                            "loadTitle": false,
                            "boxId": "",
                            "disabled": false,
                            "speechBubble": "",
                            "class": "toggle",
                            "id": "button5229e52550643",
                            "redirectUrl": "",
                            "redirectUrlExternal": ""
                        }]);
                    });
                }
            </script>
            <button type="button" id="button5229e52550762" class="layoutButton overviewWhite green" onclick="return false;" title="Overview of the village">
                <div class="button-container addHoverClick">
                    <img src="/assets/images/x.gif" alt="">
                </div>
            </button>
            <script type="text/javascript">
                if ($('button5229e52550762')) {
                    $('button5229e52550762').addEvent('click', function() {
                        window.fireEvent('buttonClicked', [this, {
                            "type": "green",
                            "onclick": "return false;",
                            "loadTitle": false,
                            "boxId": "",
                            "disabled": false,
                            "speechBubble": "",
                            "class": "",
                            "id": "button5229e52550762",
                            "redirectUrl": "dorf3.php",
                            "redirectUrlExternal": ""
                        }]);
                    });
                }
            </script>
            <div class="clear"></div>
            <div class="expansionSlotInfo" title="Villages: {{ $user->villages_count }} / {{ $max }} {{ __('MV_CULTURE') }} {{ $user->experience }} / {{ $vmax }}">
                <div class="boxTitleAdditional">{{ $user->villages_count }} / {{ $max }}&nbsp;</div>
                <div class="boxTitle">Villages</div>
                <div class="villageListBarBox">
                    <div class="bar" style="width:{{ $wids }}%">&nbsp;</div>
                </div>
            </div>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Translation.add({
                        'villagelist_collapsed': 'Show coordinates',
                        'villagelist_expanded': 'Hide coordinates'
                    });

                    var box = $('sidebarBoxVillagelist');
                    box.down('button.toggle').addEvent('click', function(e) {
                        Travian.Game.Layout.toggleBox(box, 'travian_toggle', 'villagelist');
                    });
                });
            </script>
        </div>
        <div class="innerBox content">
            <ul>
                @foreach ($villages as $village)
                    <li class="{{ ($village->id == $village->wid) ? 'active' : '' }}" title="{{ $village->name . ' (' . $village->x . '|' . $village->y . ')' }}">
                        <a href="?newdid={{ $village->id . '&' . $vill }}" accesskey="b" class="{{ ($village->id == $village->wid) ? 'active' : '' }}">
                            <img src="/assets/images/x.gif" class="{{ $village_attack[$village->id] }}" />
                            <div class="name">{{ $village->name }}</div>
                            <span class="coordinates coordinatesWrapper coordinatesAligned coordinatesLTR">
                            <span class="coordinateX">({{ $village->x }}</span>
                            <span class="coordinatePipe">|</span>
                            <span class="coordinateY">{{ $village->y }})</span>
                        </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="innerBox footer"></div>
    </div>
</div>
