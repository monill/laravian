@extends('layouts.main')

@section('content')

    <div id="background">
        <div id="headerBar"></div>
        <div id="bodyWrapper">

            @include('partials.navbar')

            <div id="center">
                <a id="ingameManual" href="help">
                    <img class="question" alt="Help" src="{{ Vite::asset('resources/images/x.gif') }}">
                </a>

                <div id="sidebarBeforeContent" class="sidebar beforeContent">
                    @include('partials.hero-side')
                    @include('partials.alliance')
                    @include('partials.infomsg')
                    @include('partials.links')
                    <div class="clear"></div>
                </div>
                <div id="contentOuterContainer">
                    @include('partials.res')
                    <div class="contentTitle">
                        <a id="closeContentButton" class="contentTitleButton" href="dorf1" title="CLOSE"></a>
                        <a id="answersButton" class="contentTitleButton" href="#" title="TRAVIANANS"></a>
                    </div>
                    <div class="contentContainer">
                        <div id="content" class="statistics">

                            <h1 class="titleInHeader">HDR_STATIS</h1>

                            <div class="contentNavi subNavi">
                                <div title="" <?php (!isset($_GET['tid']) || (isset($_GET['tid']) && ($_GET['tid'] == 1 || $_GET['tid'] == 31 || $_GET['tid'] == 32 || $_GET['tid'] == 7))) ? 'class="container active"' : 'class="container normal"'; ?>>
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="statistiken">
                                            <span class="tabItem">Overview</span>
                                        </a>
                                    </div>
                                </div>
                                <div title="" <?php (isset($_GET['tid']) && ($_GET['tid'] == 4 || $_GET['tid'] == 41 || $_GET['tid'] == 42 || $_GET['tid'] == 43)) ? 'class="container active"' : 'class="container normal"'; ?>>
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="statistiken?tid=4">
                                            <span class="tabItem">Alliance</span>
                                        </a>
                                    </div>
                                </div>
                                <div title="" <?php (isset($_GET['tid']) && $_GET['tid'] == 2) ? 'class="container active"' : 'class="container normal"'; ?>>
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="statistiken?tid=2">
                                            <span class="tabItem">Villages</span>
                                        </a>
                                    </div>
                                </div>
                                <div title="" <?php (isset($_GET['tid']) && $_GET['tid'] == 8) ? 'class="container active"' : 'class="container normal"'; ?>>
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="statistiken?tid=8">
                                            <span class="tabItem">Hero</span>
                                        </a>
                                    </div>
                                </div>
                                <?php if ($session->plus) { ?>
                                    <div title="" <?php (isset($_GET['tid']) && $_GET['tid'] == 50) ? 'class="container active"' : 'class="container normal"'; ?>>
                                        <div class="background-start"></div>
                                        <div class="background-end"></div>
                                        <div class="content">
                                            <a href="statistiken?tid=50">
                                                <span class="tabItem">PF_PLUS</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div title="" <?php (isset($_GET['tid']) && $_GET['tid'] == 0) ? 'class="container active"' : 'class="container normal"'; ?>>
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="statistiken?tid=0">
                                            <span class="tabItem">PF_GENERAL</span>
                                        </a>
                                    </div>
                                </div>
                                <div title="" <?php (isset($_GET['tid']) && $_GET['tid'] == 9) ? 'class="container active"' : 'class="container normal"'; ?>>
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="statistiken?tid=9">
                                            <span class="tabItem">AL_BONUS</span>
                                        </a>
                                    </div>
                                </div>
                                <?php if (SHOWWW2 == TRUE) {
                                    include "templates/Ranking/ww2";
                                }
                                if ($session->uid == 4) { ?>
                                    <div title="" class="container gold normal">
                                        <div class="background-start"></div>
                                        <div class="background-end"></div>
                                        <div class="content">
                                            <a href="admins">
                                                <span class="tabItem">PF_ADMIN</span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="clear"></div>
                            </div>
                            <?php
                            if (isset($_GET['tid'])) {
                                switch ($_GET['tid']) {
                                    case 31:
                                        include("templates/Ranking/player_attack");
                                        break;
                                    case 32:
                                        include("templates/Ranking/player_defend");
                                        break;
                                    case 7:
                                        include("templates/Ranking/player_top10");
                                        break;
                                    case 2:
                                        include("templates/Ranking/villages");
                                        break;
                                    case 4:
                                        include("templates/Ranking/alliance");
                                        break;
                                    case 8:
                                        include("templates/Ranking/heroes");
                                        break;
                                    case 9:
                                        include("templates/Ranking/winner");
                                        break;
                                    case 41:
                                        include("templates/Ranking/alliance_attack");
                                        break;
                                    case 42:
                                        include("templates/Ranking/alliance_defend");
                                        break;
                                    case 43:
                                        include("templates/Ranking/ally_top10");
                                        break;
                                    case 0:
                                        include("templates/Ranking/general");
                                        break;
                                    case 50:
                                        include("templates/Ranking/2plus");
                                        break;
                                    case 1:
                                        include("templates/Ranking/overview");
                                        break;
                                    default:
                                        include("templates/Ranking/ww");
                                        break;
                                }
                            } else {
                                include("templates/Ranking/overview");
                            }
                            ?>
                        </div>
                    </div>
                    <div class="contentFooter"></div>
                </div>
                <div id="sidebarAfterContent" class="sidebar afterContent">
                    @include('partials.sideinfo')
                    @include('partials.multivillage')
                    @include('partials.quest')
                </div>
                <div class="clear"></div>
                @include('partials.footer')
            </div>
            <div id="ce"></div>
        </div>
    </div>

@endsection

<script type="text/javascript">
    window.addEvent('domready', function() {
        $$('.subNavi').each(function(element) {
            new Travian.Game.Menu(element);
        });
    });
</script>
