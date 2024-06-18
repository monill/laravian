@extends('layouts.main')

@section('content')

    <div id="background">
        <div id="headerBar"></div>
        <div id="bodyWrapper">

            @include('partials.navbar')

            <div id="center">
                <a id="ingameManual" href="help">
                    <img class="question" alt="Help" src="..//images/x.gif">
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
                        <div id="content" class="universal">
                            <h1 class="titleInHeader">Help System</h1>
                            <div class="helpInfoBlock">
                                <a class="helpHeadLine" href="#">FAQ</a>
                                <a class="helpText" href="#">
                                    Here, you can find your answers about Travian. If you really can't find your answer
                                    here, you can also contact our ingame support afterwards.
                                </a>
                            </div>

                            <div class="helpInfoBlock">
                                <a class="helpHeadLine" href="rules">Rules</a>
                                <a class="helpText" href="rules">
                                    Here, you can find the current game rules.
                                </a>
                            </div>

                            <div class="helpInfoBlock">
                                <a class="helpHeadLine" href="contact">Contact Ingame Support</a>
                                <a class="helpText" href="contact">
                                    If you couldn't find an answer, contact the ingame support here.
                                </a>
                            </div>

                            <div class="helpInfoBlock">
                                <a class="helpHeadLine" href="plus?id=8">Plus Questions</a>
                                <a class="helpText" href="plus?id=8">
                                    You can ask questions about payment and premium features here.
                                </a>
                            </div>

                            <div class="helpInfoBlock">
                                <a class="helpHeadLine" href="#">Forum</a>
                                <a class="helpText" href="#">
                                    On our Forum, you can meet and converse with other players.
                                </a>
                            </div>

                            <div class="helpInfoBlock">
                                <a class="helpHeadLine" href="#">Short Instruction</a>
                                <a class="helpText" href="#">
                                    Here you can find short explanations about the troops and buildings found in Travian.
                                </a>
                            </div>
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
