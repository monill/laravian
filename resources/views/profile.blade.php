@extends('layouts.main')

@section('content')

    <div id="background">
        <div id="headerBar"></div>
        <div id="bodyWrapper">

            @include('partials.navbar')

            <div id="center">
                <a id="ingameManual" href="help">
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
                        <div id="content" class="player">
                            <?php $username = $database->getUserField($_GET['uid'], "username", 0); ?>
                            <h1 class="titleInHeader">
                                <?php
                                echo AL_PLAYER;
                                if (isset($_GET['uid']) && is_numeric($_GET['uid'])) {
                                    echo "- " . $username;
                                } ?>
                            </h1>

                            <?php
                            if ((isset($_GET['uid']) && $_GET['uid'] == $session->uid) || !isset($_GET['uid'])) {
                                include("templates/Profile/menu.php");
                            }
                            if (isset($_GET['uid'])) {
                                if ($_GET['uid'] >= 2) {
                                    $user = $database->getUser($_GET['uid'], 1);
                                    if (isset($user['id'])) {
                                        include("templates/Profile/overview.php");
                                    } else {
                                        include("templates/Profile/notfound.php");
                                    }
                                } else {
                                    include("templates/Profile/special.php");
                                }
                            } else if (isset($_GET['s'])) {
                                if ($_GET['s'] == 1) {
                                    include("templates/Profile/profile.php");
                                } elseif ($_GET['s'] == 2) {
                                    include("templates/Profile/preference.php");
                                } elseif ($_GET['s'] == 3) {
                                    include("templates/Profile/account.php");
                                } elseif ($_GET['s'] > 4 or $session->is_sitter == 1) {
                                    header("Location: " . $_SERVER['PHP_SELF'] . "?uid=" . preg_replace("/[^a-zA-Z0-9_-]/", "", $session->uid));
                                    exit();
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
<script type="text/javascript">
    window.addEvent('domready', function() {
        $$('.subNavi').each(function(element) {
            new Travian.Game.Menu(element);
        });
    });
</script>
