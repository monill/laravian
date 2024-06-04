<div id="header">
    <a id="logo" href="#" title="SERVER_NAME"></a>
    <ul id="navigation">
        <li id="n1" class="villageResources">
            <a class="{{ active('resources') }}" href="resources" accesskey="1" title="resources"></a>
        </li>
        <li id="n2" class="villageBuildings">
            <a class="{{ active('village') }}" href="village" accesskey="2" title="village"></a>
        </li>
        <li id="n3" class="map">
            <a class="{{ active('map') }}" href="map" accesskey="3" title="map"></a>
        </li>
        <li id="n4" class="statistics">
            <a class="{{ active('statistics') }}" href="statistics" accesskey="4" title="statistics"></a>
        </li>
        <li id="n5" class="reports">
            <a class="{{ active('reports') }}" href="reports" accesskey="5" title="reports $unnotice"></a>
            {{--                        <?php if ($message->nunread): ?>--}}
            {{--                            <div class="speechBubbleContainer ">--}}
            {{--                                <div class="speechBubbleBackground">--}}
            {{--                                    <div class="start">--}}
            {{--                                        <div class="end">--}}
            {{--                                            <div class="middle"></div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="speechBubbleContent">$unnotice</div>--}}
            {{--                            </div>--}}
            {{--                        <?php endif; ?>--}}
        </li>
        <li id="n6" class="messages">
            <a class="{{ active('messages') }}" href="messages" accesskey="6" title="messages $unmsg"></a>
            {{--                        <?php if ($message->nunread): ?>--}}
            {{--                            <div class="speechBubbleContainer ">--}}
            {{--                                <div class="speechBubbleBackground">--}}
            {{--                                    <div class="start">--}}
            {{--                                        <div class="end">--}}
            {{--                                            <div class="middle"></div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="speechBubbleContent">$unmsg</div>--}}
            {{--                            </div>--}}
            {{--                        <?php endif; ?>--}}
        </li>
        <li id="n7" class="gold">
            <a class="{{ active('gold') }}" href="gold" accesskey="7" title="Buy Gold" ></a>
        </li>
    </ul>

    <div id="goldSilver">
        <div class="gold">
            <img src="/assets/images/x.gif" alt="GOLD" title="Gold" class="gold" />
            <span class="ajaxReplaceableGoldAmount">$session->gold</span>
        </div>
        <div class="silver">
            <a href="hero/auction"><img src="/assets/images/x.gif" alt="SILVER" title="Silver" class="silver" /></a>
            <span class="ajaxReplaceableSilverAmount">$session->silver</span>
        </div>
    </div>
    <ul id="outOfGame" class="LTR">
        <li class="profile">
            <a href="spieler?uid=$session->uid" title="Profile">
                <img src="/assets/images/x.gif" alt="Profile" />
            </a>
        </li>
        <li class="options">
            <a href="options" title="Settings">
                <img src="/assets/images/x.gif" alt="Settings" />
            </a>
        </li>
        <li class="forum">
            <a href="#" title="Forum">
                <img src="/assets/images/x.gif" alt="Forum" />
            </a>
        </li>
        <li class="chat">
            <a href="#" title="Chat">
                <img src="/assets/images/x.gif" alt="Chat" />
            </a>
        </li>
        <li class="help">
            <a href="help" title="Help">
                <img src="/assets/images/x.gif" alt="Help" />
            </a>
        </li>
        <li class="logout">
            <a href="logout" title="Logout">
                <img src="/assets/images/x.gif" alt="Logout" />
            </a>
        </li>
        <li class="clear"></li>
    </ul>
</div>
