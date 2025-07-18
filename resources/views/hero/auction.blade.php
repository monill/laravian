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
                        <div id="content" class="hero_auction">
                            <h1 class="titleInHeader">Hero</h1>

                            <div class="contentNavi subNavi">
                                <div class="container normal">
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="hero_inventory.php">
                                            <span class="tabItem"><?php echo HERO_HEROATTRIBUTES; ?></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="container normal">
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="hero.php">
                                            <span class="tabItem"><?php echo HERO_HEROAPPEARANCE; ?></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="container normal">
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="hero_adventure.php">
                                            <span class="tabItem"><?php echo HERO_HEROADVENTURE; ?></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="container active">
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="hero_auction.php">
                                            <span class="tabItem"><?php echo HERO_HEROAUCTION; ?></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <?php

                            if (isset($_GET['action']) && $_GET['action'] == 'sell' && isset($_GET['abort']) && $_GET['abort']) {
                                $aucData = $database->getAuctionData($_GET['abort']);
                                $usedtime = AUCTIONTIME - ($aucData["time"] - $_SERVER['REQUEST_TIME']);
                                $bids = $aucData["bids"];
                                if ($aucData['owner'] == $session->uid && !(($usedtime > (AUCTIONTIME / 10)) || ($bids != 0)))
                                    $database->delAuction($_GET['abort']);
                            }
                            $sql = mysql_query("SELECT * FROM auction WHERE finish = 0 and owner = '" . $session->uid . "'");
                            $query = mysql_num_rows($sql);
                            if (isset($_GET['action']) && $_GET['action'] == 'sell' && isset($_POST['a']) && $_POST['a'] == 'e45') {
                                $_POST['amount'] = intval($_POST['amount']);
                                $_POST['id'] = intval($_POST['id']);
                                $useraccess = $database->getUserField($session->uid, 'access', 0);
                                if (($query < MAXSELL) || ($useraccess == 9)) {
                                    $data = $database->getHeroItem($_POST['id']);
                                    if ($data['uid'] == $session->uid && $_POST['amount'] > 0 && $_POST['amount'] <= $data['num'])
                                        $database->addAuction($session->uid, $_POST['id'], $data['btype'], $data['type'], $_POST['amount']);
                                }
                            }

                            if ((isset($_POST['a']) && $_POST['action'] == 'buy') || (isset($_POST['a']) && $_POST['action'] == 'bids')) {
                                $_POST['a'] = intval($_POST['a']);
                                $getBidData = $database->getBidData($_POST['a']);
                                if ($getBidData['owner'] != $session->uid) {
                                    $bidError = 0;
                                    if (!isset($getBidData) || $getBidData == null) {
                                        $bidError = 6;
                                    } elseif ($getBidData['finish'] == 1 || $getBidData['time'] < $_SERVER['REQUEST_TIME']) {
                                        $bidError = 5;
                                    } else {
                                        $_POST['maxBid'] = intval($_POST['maxBid']);
                                        if ($_POST['maxBid'] <= 0) $_POST['maxBid'] = 0;
                                        $userData = $database->getUser($session->uid, 1);
                                        if (($getBidData['uid'] == $session->uid && $_POST['maxBid'] < $getBidData['silver']) ||
                                            ($getBidData['uid'] != $session->uid && $_POST['maxBid'] <= $getBidData['silver'])
                                        ) {
                                            $bidError = 1;
                                        } else {
                                            $newtime = $_SERVER['REQUEST_TIME'] + max(min(300, AUCTIONTIME), $getBidData['time'] - $_SERVER['REQUEST_TIME']);
                                            if ($getBidData['uid'] == 0) {
                                                if ($_POST['maxBid'] > $session->silver) {
                                                    $bidError = 3;
                                                } else {
                                                    $database->addBid($_POST['a'], $session->uid, $getBidData['silver'] + 1, $_POST['maxBid'], $newtime);
                                                    $database->setSilver($session->uid, $_POST['maxBid'], 0);
                                                    $q = 'UPDATE users SET bisilver=bisilver+' . $_POST['maxBid'] . ' WHERE id=' . $session->uid;
                                                    mysql_query($q);
                                                }
                                            } elseif ($getBidData['uid'] == $session->uid) {
                                                $maxsilverchange = ($_POST['maxBid'] - $getBidData['maxsilver']);
                                                if ($maxsilverchange > $session->silver) {
                                                    $bidError = 3;
                                                } else {
                                                    $database->editBid($_POST['a'], $_POST['maxBid']);
                                                    if ($maxsilverchange > 0) {
                                                        $database->setSilver($session->uid, $maxsilverchange, 0);
                                                        $q = 'UPDATE users SET bisilver=bisilver+' . $maxsilverchange . ' WHERE id=' . $session->uid;
                                                        mysql_query($q);
                                                    } elseif ($maxsilverchange < 0) {
                                                        $maxsilverchange *= -1;
                                                        $database->setSilver($session->uid, $maxsilverchange, 1);
                                                        $q = 'UPDATE users SET bisilver=bisilver-' . $maxsilverchange . ' WHERE id=' . $session->uid;
                                                        mysql_query($q);
                                                    }
                                                }
                                            } else {
                                                if ($_POST['maxBid'] > $session->silver) {
                                                    $bidError = 3;
                                                } else {
                                                    if ($_POST['maxBid'] <= $getBidData['maxsilver']) {
                                                        $database->addBid($_POST['a'], $getBidData['uid'], $_POST['maxBid'], $getBidData['maxsilver'], $newtime);
                                                        $bidError = 4;
                                                    } else {
                                                        $database->setSilver($getBidData['uid'], $getBidData['maxsilver'], 1);
                                                        $q = 'UPDATE users SET bisilver=bisilver-' . $getBidData['maxsilver'] . ' WHERE id=' . $getBidData['uid'];
                                                        mysql_query($q);
                                                        $database->addBid($_POST['a'], $session->uid, $getBidData['maxsilver'] + 1, $_POST['maxBid'], $newtime);
                                                        $database->setSilver($session->uid, $_POST['maxBid'], 0);
                                                        $q = 'UPDATE users SET bisilver=bisilver+' . $_POST['maxBid'] . ' WHERE id=' . $session->uid;
                                                        mysql_query($q);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                if (isset($_POST['page']) && $_POST['page']) {
                                    $page = "&page=" . $_POST['page'];
                                } else {
                                    $page = "";
                                }
                                if ($_POST['action'] == 'bids') {
                                    $ssss = 'bids';
                                } elseif ($_POST['action'] == 'buy') {
                                    $ssss = 'buy';
                                }
                                if ($bidError) {
                                    $err = '&err=' . $bidError;
                                } else {
                                    $err = '';
                                }
                                header("Location: ?action=" . $ssss . $page . "&a=" . $_POST['a'] . $err);
                            }

                            include("templates/Auction/menu.php");
                            if (isset($_GET['action'])) {
                                if ($_GET['action'] == 'buy') {
                                    include("templates/Auction/buy.php");
                                } elseif ($_GET['action'] == 'sell') {
                                    include("templates/Auction/sell.php");
                                } elseif ($_GET['action'] == 'bids') {
                                    include("templates/Auction/bids.php");
                                }
                            } else {
                                include("templates/Auction/buy.php");
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
