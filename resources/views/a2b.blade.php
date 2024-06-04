@extends('layouts.main')

@section('content')

    <div id="background">
        <div id="headerBar"></div>
        <div id="bodyWrapper">

            @include('partials.navbar')

            <div id="center">
                <a id="ingameManual" href="help.php">
                    <img class="question" alt="Help" src="/assets/images/x.gif">
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
                        <div id="content" class="a2b">

                            <?php

                            if (!empty($id)) {
                                if (isset($_GET['s'])) {
                                    include "templates/a2b/newdorf.php";
                                }
                                if (isset($_GET['h'])) {
                                    include "templates/a2b/adventure.php";
                                }
                            } else
                                if (isset($_GET['f']) || isset($_GET['k'])) {
                                    $units->procTrapped($_GET);
                                } elseif (isset($_GET['anim'])) {
                                    $units->procanimals();
                                } elseif (isset($w)) {
                                    $enforce = $database->getEnforceArray($w, 0);
                                    if ($enforce['vref'] == $village->wid) {
                                        $to = $database->getVillage($enforce['from']);
                                        $ckey = $w;
                                        include("templates/a2b/sendback.php");
                                    } else {
                                        include("templates/a2b/units_" . $session->tribe . ".php");
                                        include("templates/a2b/search.php");
                                    }
                                } elseif (isset($r)) {
                                    $enforce = $database->getEnforceArray($r, 0);
                                    if ($enforce['from'] == $village->wid) {
                                        $to = $database->getVillage($enforce['from']);
                                        $ckey = $r;
                                        include("templates/a2b/sendback.php");
                                    } else {
                                        include("templates/a2b/units_" . $session->tribe . ".php");
                                        include("templates/a2b/search.php");
                                    }
                                } else {
                                    if (isset($process['0'])) {
                                        $coor = $database->getCoor($process['0']);
                                        include("templates/a2b/attack.php");
                                    } else {
                                        include("templates/a2b/units_" . $session->tribe . ".php");
                                        include("templates/a2b/search.php");
                                    }
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
    window.addEvent("domready", function () {
        var btns = document.getElementsByTagName("button");
        for (i = 0; i < btns.length; i++) {
            btns[i].addEventListener('click', function () {
                var vinpt = document.createElement("input");
                vinpt.setAttribute('type', 'hidden');
                vinpt.setAttribute('value', this.getAttribute('value'));
                vinpt.setAttribute('name', this.getAttribute('name'));
                this.parentNode.appendChild(vinpt);
                this.setAttribute('disabled', 'disabled');
                if (this.getAttribute("type") == "submit") {
                    this.up("form").submit();
                }
            });
        }
        var ancs = document.getElementsByTagName("a");
        for (i = 0; i < ancs.length; i++) {
            ancs[i].addEventListener('click', function () {
                var tmphref = this.getAttribute('href');
                var tmptarg = this.getAttribute('target');
                this.removeAttribute('href');
                if (tmphref != '' && tmphref != null) {
                    if (tmptarg == '_blank') {
                        window.open(tmphref);
                    } else {
                        window.location.href = tmphref;
                    }
                }
            });
        }
        var areas = document.getElementsByTagName("area");
        for (i = 0; i < areas.length; i++) {
            areas[i].addEventListener('click', function () {
                var tmphref = this.getAttribute('href');
                this.removeAttribute('href');
                if (tmphref != '' && tmphref != null) window.location.href = tmphref;
            });
        }
    });
</script>
