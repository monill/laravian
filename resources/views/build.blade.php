<?php

$alliance->procAlliForm($_POST);
$technology->procTech($_POST);
$market->procMarket($_POST);

if (isset($_GET['gid'])) {
    $_GET['id'] = strval($building->getTypeField($_GET['gid']));
} else if (isset($_POST['id'])) {
    $_GET['id'] = $_POST['id'];
}
if (isset($_POST['t'])) {
    $_GET['t'] = $_POST['t'];
}

if (isset($_GET['id'])) {
    if (!ctype_digit($_GET['id'])) {
        $_GET['id'] = "1";
    }
    if ($village->resarray['f' . $_GET['id'] . 't'] == 17) {
        $market->procRemove($_GET);
    }
    if ($village->resarray['f' . $_GET['id'] . 't'] == 18) {
        $alliance->procAlliance($_GET);
    }
    if ($village->resarray['f' . $_GET['id'] . 't'] == 12 || $village->resarray['f' . $_GET['id'] . 't'] == 13 || $village->resarray['f' . $_GET['id'] . 't'] == 22) {
        $technology->procTechno($_GET);
    }
    if ($_GET['id'] == 39 && isset($_GET['a']) && $_GET['a'] == 4 && isset($_GET['aa'])) {
        $aaId = intval($_GET['aa']);
        $theMov = $database->getMovementById($aaId);
        if ($theMov["from"] == $village->wid && (time() - $theMov['starttime']) <= (max(20, floor(90 / pow(INCREASE_SPEED, 1 / 3))))) {
            $database->cancelMovement($aaId, $theMov['to'], $theMov['from']);
        }
    }
}

if ($session->goldclub == 1 && count($session->villages) > 1) {
    if (isset($_POST['action']) && $_POST['action'] == 'addRoute') {
        if ($session->access != BANNED) {
            if ($session->gold >= 2) {
                for ($i = 1; $i <= 4; $i++) {
                    if ($_POST['r' . $i] == '') {
                        $_POST['r' . $i] = 0;
                    }
                }
                $totalres = preg_replace('/[^0-9]/', '', $_POST['r1']) + preg_replace('/[^0-9]/', '', $_POST['r2']) + preg_replace('/[^0-9]/', '', $_POST['r3']) + preg_replace('/[^0-9]/', '', $_POST['r4']);
                $reqMerc = ceil(($totalres - 0.1) / $market->maxcarry);

                $second = date('s');
                $minute = date('i');
                $hour = date('G') - $_POST['start'];
                if (date('G') > $_POST['start']) {
                    $day = 1;
                } else {
                    $day = 0;
                }
                $timestamp = strtotime('-' . $hour . ' hours -' . $second . ' second -' . $minute . ' minutes +' . $day . ' day');
                if ($totalres > 0) {
                    $database->createTradeRoute($session->uid, $_POST['tvillage'], $village->wid, $_POST['r1'], $_POST['r2'], $_POST['r3'], $_POST['r4'], $_POST['start'], $_POST['deliveries'], $reqMerc, $timestamp);
                    $route = 1;
                    header('Location: build.php?gid=17&t=4');
                    exit;
                } else {
                    $route = 1;
                    header('Location: build.php?gid=17&t=4&create');
                    exit;
                }
            }
        } else {
            $route = 0;
            header('Location: banned.php');
            exit;
        }
    }
    if (isset($_POST['action']) && $_POST['action'] == 'editRoute') {
        if ($session->access != BANNED) {
            $totalres = $_POST['r1'] + $_POST['r2'] + $_POST['r3'] + $_POST['r4'];
            $reqMerc = ceil(($totalres - 0.1) / $market->maxcarry);
            if ($totalres > 0) {
                $database->editTradeRoute($_POST['routeid'], 'wood', $_POST['r1'], 0);
                $database->editTradeRoute($_POST['routeid'], 'clay', $_POST['r2'], 0);
                $database->editTradeRoute($_POST['routeid'], 'iron', $_POST['r3'], 0);
                $database->editTradeRoute($_POST['routeid'], 'crop', $_POST['r4'], 0);
                $database->editTradeRoute($_POST['routeid'], 'start', $_POST['start'], 0);
                $database->editTradeRoute($_POST['routeid'], 'deliveries', $_POST['deliveries'], 0);
                $database->editTradeRoute($_POST['routeid'], 'merchant', $reqMerc, 0);
                $second = date('s');
                $minute = date('i');
                $hour = date('G') - $_POST['start'];
                if (date('G') > $_POST['start']) {
                    $day = 1;
                } else {
                    $day = 0;
                }
                $timestamp = strtotime('-$hour hours -$second seconds -$minute minutes +$day day');
                $database->editTradeRoute($_POST['routeid'], 'timestamp', $timestamp, 0);
            }
            $route = 1;
            header('Location: build.php?gid=17&t=4');
            exit;
        } else {
            $route = 0;
            header('Location: banned.php');
            exit;
        }
    }
    if (isset($_GET['action']) && $_GET['action'] == 'delRoute') {
        if ($session->access != BANNED) {
            $traderoute = $database->getTradeRouteUid($_GET['routeid']);
            if ($traderoute == $session->uid) {
                $database->deleteTradeRoute($_GET['routeid']);
                $route = 1;
                header('Location: build.php?gid=17&t=4');
                exit;
            } else {
                $route = 1;
                header('Location: build.php?gid=17&t=4');
                exit;
            }
        } else {
            $route = 0;
            header('Location: banned.php');
            exit;
        }
    }
}

if (isset($_POST['h']) && $_POST['a'] == 'adventure') {
    $units->Adventures($_POST);
} elseif (isset($_POST['a']) == 533374 && isset($_POST['id']) == 39) {
    $units->Settlers($_POST);
}
?>

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
                        <a id="closeContentButton" class="contentTitleButton" href="<?php echo ($_GET['id'] < 19) ? 'dorf1.php' : 'dorf2.php'; ?> " title="CLOSE"></a>
                        <a id="answersButton" class="contentTitleButton" href="#" target="_blank" title="TRAVIANANS"></a>
                    </div>
                    <div class="contentContainer">

                        <div id='content' class='build'>
                            <?php

                            if (isset($_GET['id'])) {
                                if (isset($_GET['s'])) {
                                    if (!ctype_digit($_GET['s'])) {
                                        $_GET['s'] = null;
                                    }
                                }
                                if (isset($_GET['t'])) {
                                    if (!ctype_digit($_GET['t'])) {
                                        $_GET['t'] = null;
                                    }
                                }
                                if (!ctype_digit($_GET['id'])) {
                                    $_GET['id'] = "1";
                                }
                                $id = $_GET['id'];
                                if (($village->resarray['f99t'] == 40) && ($id == '26' || $id == '30' || $id == '31' || $id == '32')) {
                                    $id = 99;
                                    $_GET['id'] = 99;
                                }
                                if ($id == '99') {
                                    if ($village->resarray['f99t'] == 40) {
                                        include("templates/Build/ww.php");
                                    } else {
                                        header('Location: dorf2.php');
                                        exit;
                                    }
                                } elseif ($village->resarray['f' . $_GET['id'] . 't'] == 0 && $_GET['id'] >= 19) {
                                    include("templates/Build/avaliable.php");
                                } else {
                                    if (isset($_GET['t'])) {
                                        if ($_GET['t'] == 1) {
                                            $_SESSION['loadMarket'] = 1;
                                        }
                                        include("templates/Build/" . $village->resarray['f' . $_GET['id'] . 't'] . "_" . $_GET['t'] . ".php");
                                    } else
                                        if (isset($_GET['s'])) {
                                            include("templates/Build/" . $village->resarray['f' . $_GET['id'] . 't'] . "_" . $_GET['s'] . ".php");
                                        } else {
                                            include("templates/Build/" . $village->resarray['f' . $_GET['id'] . 't'] . ".php");
                                        }
                                    if (isset($_GET['t']) == 99) {

                                        if (isset($_GET['action']) && $_GET['action'] == 'addList') {
                                            include("templates/goldClub/farmlist_add.php");
                                        }
                                        if (isset($_GET['action']) && $_GET['action'] == 'showSlot' && $_GET['lid']) {
                                            include("templates/goldClub/farmlist_addraid.php");
                                        } elseif (isset($_GET['action']) && $_GET['action'] == 'showSlot' && $_GET['eid']) {
                                            include("templates/goldClub/farmlist_editraid.php");
                                        }
                                        if (isset($_GET['action']) && $_GET['action'] == 'removeList') {
                                            $database->delFarmList($_GET['lid'], $session->uid);
                                            header("Location: build.php?id=39&t=99");
                                            die;
                                        } elseif (isset($_GET['action']) && $_GET['action'] == 'removeSlot') {
                                            $database->delSlotFarm($_GET['eid']);
                                            header("Location: build.php?id=39&t=99");
                                            die;
                                        }
                                    }
                                }
                            }
                            ?>
                            <div class='clear'></div>
                        </div>
                        <div class='clear'></div>
                    </div>
                    <div class='contentFooter'></div>
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
