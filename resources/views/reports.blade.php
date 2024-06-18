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
                        <div id="content" class="reports">
                            <h1 class="titleInHeader">REPORTS</h1>

                            <div class="contentNavi subNavi">
                                <div title="" class="container <?php (!isset($_GET['t'])) ? 'active' : 'normal'; ?>">
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content"><a href="reports"><span class="tabItem">HEADER_ALL</span></a></div>
                                </div>
                                <div title="" class="container <?php (isset($_GET['t']) && $_GET['t'] == 1) ? 'active' : 'normal' ?>">
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content"><a href="reports?t=1"><span class="tabItem">HEADER_TRADE</span></a></div>
                                </div>
                                <div title="" class="container <?php (isset($_GET['t']) && $_GET['t'] == 2) ? 'active' : 'normal' ?>">
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content"><a href="reports?t=2"><span class="tabItem">HEADER_REINFORCEMENT</span></a></div>
                                </div>
                                <div title="" class="container <?php (isset($_GET['t']) && $_GET['t'] == 3) ? 'active' : 'normal' ?>">
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content"><a href="reports?t=3"><span class="tabItem">HEADER_MISCELLANEOUS</span></a></div>
                                </div>
                                <?php if ($session->plus) { ?>
                                    <div title="" class="container <?php (isset($_GET['t']) && $_GET['t'] == 4) ? 'active' : 'normal' ?>">
                                        <div class="background-start"></div>
                                        <div class="background-end"></div>
                                        <div class="content"><a href="reports?t=4"><span class="tabItem">MS_ARCHIVE</span></a></div>
                                    </div>
                                <?php } ?>
                                <div class="clear"></div>
                            </div>
                            <?php
                            if (isset($_GET['n1']) && isset($_GET['del']) == 1) {
                                $database->delNotice($_GET['n1'], $session->uid);
                                header("Location: reports");
                            }
                            if (isset($_GET['aid'])) {
                                if ($session->alliance == $_GET['aid']) {
                                    if (isset($_GET['id'])) {
                                        $type = $database->getNotice2($_GET['id'], 'type');
                                        switch ($type) {
                                            case 0:
                                            case 1:
                                            case 2:
                                            case 3:
                                                $type = 1;
                                                break;
                                            case 4:
                                            case 5:
                                            case 6:
                                            case 7:
                                                $type = 4;
                                                break;
                                            case 10:
                                            case 11:
                                            case 12:
                                            case 13:
                                            case 14:
                                                $type = 10;
                                                break;
                                            case 15:
                                            case 16:
                                            case 17:
                                            case 18:
                                            case 19:
                                                $type = 1;
                                                break;
                                        }
                                        include("templates/Notice/" . $type . ".php");
                                    }
                                }
                            } else {
                                if (isset($_GET['t'])) {
                                    include("templates/Notice/t_" . $_GET['t'] . ".php");
                                } elseif (isset($_GET['id'])) {
                                    if ($database->getNotice2($_GET['id'], 'uid') == $session->uid || $session->access >= MULTIHUNTER) {
                                        $type = ($message->readingNotice['ntype'] == 5) ? $message->readingNotice['archive'] : $message->readingNotice['ntype'];
                                        switch ($type) {
                                            case 0:
                                            case 1:
                                            case 2:
                                            case 3:
                                                $type = 1;
                                                break;
                                            case 4:
                                            case 5:
                                            case 6:
                                            case 7:
                                                $type = 4;
                                                break;
                                            case 10:
                                            case 11:
                                            case 12:
                                            case 13:
                                            case 14:
                                                $type = 10;
                                                break;
                                            case 15:
                                            case 16:
                                            case 17:
                                            case 18:
                                            case 19:
                                                $type = 1;
                                                break;
                                        }
                                        include("templates/Notice/" . $type . ".php");
                                    }
                                } else {
                                    include("templates/Notice/all.php");
                                }
                            }
                            ?>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
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
