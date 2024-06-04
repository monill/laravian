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
                        <a id="closeContentButton" class="contentTitleButton" href="dorf1" title="BL_CLOSE"></a>
                        <a id="answersButton" class="contentTitleButton" href="#" title="BL_TRAVIANANS"></a>
                    </div>
                    <div class="contentContainer">
                        <div id="content" class="messages">
                            <h1 class="titleInHeader">MS_HEADERMESSAGES</h1>
                            @include('partials.messages.menu')

                            <?php
                            if (isset($_GET['token']) && $_GET['token'] == $_SESSION['tok_key']) {
                                echo '<p style="color:red">' . sprintf(MS_SPAMMSG, ANTI_SPAM_TIME) . '</p>';
                            }
                            if (isset($_GET['id']) && !isset($_GET['t'])) {
                                $message->loadMessage($_GET['id']);
                                include("templates/Message/read.php");
                            } elseif (isset($_GET['n1']) && !isset($_GET['t'])) {
                                $database->delMessage($_GET['n1']);
                                header("Location: nachrichten");
                                die;
                            } else if (isset($_GET['t'])) {
                                switch ($_GET['t']) {
                                    case 1:
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                        }
                                        include("templates/Message/write.php");
                                        break;
                                    case 2:
                                        include("templates/Message/sent.php");
                                        break;
                                    case 3:
                                        if ($session->goldclub) {
                                            include("templates/Message/archive.php");
                                        }
                                        break;
                                    case 4:
                                        // if($session->plus) {
                                        $message->loadNotes();
                                        include("templates/Message/notes.php");
                                        // }
                                        break;
                                    case 5:
                                        include('templates/Message/ignore.php');
                                        break;
                                    case 6:
                                        include('templates/Message/reports.php');
                                        break;
                                    default:
                                        include("templates/Message/inbox.php");
                                        break;
                                }
                            } else {
                                include("templates/Message/inbox.php");
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
