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
                        <div id="content" class="options">
                            <?php $username = $database->getUserField($_GET['uid'], 'username', 0); ?>
                            <h1 class="titleInHeader"><?php echo PF_PREFERENCES; ?></h1>

                            <div class="contentNavi subNavi">
                                <div title="" class="container <?php echo (isset($_GET['s']) && $_GET['s'] == 1) ? "active" : "normal"; ?>">
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="options.php?s=1">
                                            <span class="tabItem"><?php echo PF_GAME; ?></span>
                                        </a>
                                    </div>
                                </div>
                                <div title="" class="container <?php echo (isset($_GET['s']) && $_GET['s'] == 2) ? "active" : "normal"; ?>">
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="options.php?s=2">
                                            <span class="tabItem"><?php echo PF_ACCOUNT; ?></span>
                                        </a>
                                    </div>
                                </div>
                                <div title="" class="container <?php echo (isset($_GET['s']) && $_GET['s'] == 3) ? "active" : "normal"; ?>">
                                    <div class="background-start"></div>
                                    <div class="background-end"></div>
                                    <div class="content">
                                        <a href="options.php?s=3">
                                            <span class="tabItem"><?php echo PF_SITTER; ?></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php
                            if ($session->is_sitter != 1) {
                                if (isset($_GET['s'])) {
                                    $_GET['s'] = filter_var($_GET['s'], FILTER_SANITIZE_NUMBER_INT);
                                    $_GET['s'] = str_replace('-', '', $_GET['s']);

                                    switch ($_GET['s']) {
                                        case 1:
                                            include('templates/Profile/settings.php');
                                            break;
                                        case 2:
                                            include('templates/Profile/account.php');
                                            break;
                                        case 3:
                                            include('templates/Profile/sitter.php');
                                            break;
                                        default:
                                            include('templates/Profile/settings.php');
                                            break;
                                    }

                                    if ($_GET['s'] > 4 or $session->is_sitter == 1) {
                                        header('Location: ' . $_SERVER['PHP_SELF'] . '?uid=' . preg_replace('/[^a-zA-Z0-9_-]/', '', $session->uid));
                                        die;
                                    }
                                }
                                if (isset($_GET['id']) == $session->uid && isset($_GET['type']) == 3) {
                                    $_GET['owner'] = filter_var($_GET['owner'], FILTER_SANITIZE_NUMBER_INT);
                                    $_GET['owner'] = str_replace('-', '', $_GET['owner']);
                                    $_GET['id'] = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
                                    $_GET['id'] = str_replace('-', '', $_GET['id']);
                                    $owner = $_GET['owner'];
                                    $id = $_GET['id'];
                                    $database->removeMeSit($owner, $id);
                                }
                            } else {
                                echo "<font color=red>" . PF_CANTACCESS . "</font>";
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
