<?php
$q = mysql_query("SELECT `quest` FROM users WHERE id = " . $session->uid);
$q = mysql_fetch_assoc($q);

if ($session->uid > 4 && $q['quest'] != 99) {
include("templates/Ajax/quest_mentor.php"); ?>
<div id="sidebarBoxQuestmaster" class="sidebarBox ">
    <div class="sidebarBoxBaseBox">
        <div class="baseBox baseBoxTop">
            <div class="baseBox baseBoxBottom">
                <div class="baseBox baseBoxCenter"></div>
            </div>
        </div>
    </div>
    <div class="sidebarBoxInnerBox">
        <div class="innerBox header ">
            <button id="questmasterButton" title="<?php echo QS_DISPTASK; ?>" class="forceDisplayElement vid_<?php echo $session->tribe; ?>" type="button">
                <img class="border" src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
                <img class="animation" src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
                <img class="mentor" src="{{ Vite::asset('resources/images/x.gif') }}" alt="">
                <?php if ($_SESSION['qstnew'] == 1 || !isset($_SESSION['qstnew'])) {
                    echo '<div class="bigSpeechBubble newQuestSpeechBubble" title="">
							<img src="/assets/images/x.gif" alt="">
						</div>';
                } ?>
            </button>
            <button type="button" id="button5229e525518b8" class="layoutButton bulbWhite green  " onclick="return false;" title="<?php echo QS_DISPINTERF; ?>">
                <div class="button-container addHoverClick">
                    <img src="/assets/images/x.gif" alt="" />
                </div>
            </button>
            <script type="text/javascript">
                if ($('button5229e525518b8')) {
                    $('button5229e525518b8').addEvent('click', function() {
                        window.fireEvent('buttonClicked', [this, {
                            "type": "green",
                            "onclick": "return false;",
                            "loadTitle": false,
                            "boxId": "",
                            "disabled": false,
                            "speechBubble": "",
                            "class": "",
                            "id": "button5229e525518b8",
                            "redirectUrl": "",
                            "redirectUrlExternal": "",
                            "overlay": []
                        }]);
                    });
                }
            </script>
            <div class="clear"></div>
            <div class="boxTitle"><?php if ($_SESSION['qst'] != 0) {
                    echo QS_TASKHELP;
                } else {
                    echo QS_DISWELCOME;
                } ?></div>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        isTutorial: <?php
                        if ($_SESSION['qst'] < 15) {
                            echo "true";
                        } else {
                            echo "false";
                        } ?>
                    });
                    Travian.Game.Quest.animateQuestMaster();
                    // Dialog an den Questmaster binden
                    $('questmasterButton').addEvent('click', function() {
                        Travian.Game.Quest.mentorClick('Tutorial_' + <?php
                            if ($_SESSION['qst'] < 10) {
                                echo "0" . $_SESSION['qst'];
                            } else {
                                echo $_SESSION['qst'];
                            } ?>);
                    });
                });
            </script>
            <div>
                <script type="text/javascript">
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.toggleHighlights(true);
                    $$('.questInformation .iconButton.small.cancel').addEvent('click', function() {
                        setTimeout(function() {
                            Travian.Game.Quest.createHighlights();
                            Travian.Game.Quest.toggleHighlights(true);
                        }, 500);
                    });
                </script>
            </div>
        </div>
        <div class="innerBox content">
            <ul id="mentorTaskList" class="">
                <?php
                if ($_SESSION['qst'] < 15) {
                $i = 0;
                if ($_SESSION['q']) {
                    // unset($_SESSION);
                    foreach ($_SESSION['q'] as $q) {
                        echo '<li>';
                        if ($_SESSION['done'][$i] == 1) {
                            echo '<img class="finished" src="/assets/images/x.gif">';
                        }
                        echo $q;
                        echo '</li>';
                        $i++;
                    }
                } else {
                    echo '<li>' . QS_STARTTUT . '</li>';
                } ?>
                <script type="text/javascript">
                    Travian.Translation.add('answers.tutorial_01_title', "Travian Answers");
                </script>

            </ul>
            <?php

            } elseif ($_SESSION['qst'] >= 15) {

            $qquery = mysql_query("SELECT `quest_battle` FROM users WHERE id=" . $session->uid) or die(mysql_error());
            $qquery = mysql_fetch_assoc($qquery);
            $qdataarray = explode(',', $qquery['quest_battle']);
            $totbattle = 0;
            foreach ($qdataarray as $bat) {
                if ($bat > 0) $totbattle++;
            }
            $qquery2 = mysql_query("SELECT `quest_economy` FROM users WHERE id=" . $session->uid) or die(mysql_error());
            $qquery2 = mysql_fetch_assoc($qquery2);
            $qdataarray2 = explode(',', $qquery2['quest_economy']);
            $toteconomy = 0;
            foreach ($qdataarray2 as $eco) {
                if ($eco > 0) $toteconomy++;
            }
            $qquery3 = mysql_query("SELECT `quest_world` FROM users WHERE id=" . $session->uid) or die(mysql_error());
            $qquery3 = mysql_fetch_assoc($qquery3);
            $qdataarray3 = explode(',', $qquery3['quest_world']);
            $totworld = 0;
            foreach ($qdataarray3 as $wrl) {
                if ($wrl > 0) $totworld++;
            }

            if ($totbattle == 14 && $toteconomy == 9 && $totworld == 14)
                mysql_query("UPDATE users SET `quest`=99 WHERE id = " . $session->uid) or die(mysql_error());


            if ($qdataarray[0] == 0) {
                $q1 = 'Next adventure';
                $id = 'Battle_01';
            } elseif ($qdataarray[2] == 0) {
                $q1 = 'Build Barracks';
                $id = 'Battle_03';
            } elseif ($qdataarray[4] == 0) {
                $q1 = 'Force training';
                $id = 'Battle_05';
            } elseif ($qdataarray[6] == 0) {
                $q1 = 'Attack on Abadi';
                $id = 'Battle_07';
            } elseif ($qdataarray[8] == 0) {
                $q1 = 'Sales';
                $id = 'Battle_09';
            } elseif ($qdataarray[10] == 0) {
                $q1 = 'Making Darfalone';
                $id = 'Battle_11';
            } elseif ($qdataarray[12] == 0) {
                $q1 = 'Forging';
                $id = 'Battle_13';
            }
            if ($qdataarray[1] == 0) {
                $q2 = 'Making a hideout';
                $id2 = 'Battle_02';
            } elseif ($qdataarray[3] == 0) {
                $q2 = 'Hero Level';
                $id2 = 'Battle_04';
            } elseif ($qdataarray[5] == 0) {
                $q2 = 'Wall';
                $id2 = 'Battle_06';
            } elseif ($qdataarray[7] == 0) {
                $q2 = '10 Adventure ';
                $id2 = 'Battle_08';
            } elseif ($qdataarray[9] == 0) {
                $q2 = 'Upgrade barracks';
                $id2 = 'Battle_10';
            } elseif ($qdataarray[11] == 0) {
                $q2 = 'Investigating Forces';
                $id2 = 'Battle_12';
            } elseif ($qdataarray[13] == 0) {
                $q2 = 'Improving forces';
                $id2 = 'Battle_14';
            }
            //economy//
            if ($qdataarray2[0] == 0) {
                $q3 = 'Iron Mine';
                $id3 = 'Economy_01';
            } elseif ($qdataarray2[2] == 0) {
                $q3 = 'Warehouse';
                $id3 = 'Economy_03';
            } elseif ($qdataarray2[4] == 0) {
                $q3 = 'To 2!';
                $id3 = 'Economy_05';
            } elseif ($qdataarray2[6] == 0) {
                $q3 = 'Business';
                $id3 = 'Economy_07';
            } elseif ($qdataarray2[8] == 0) {
                $q3 = 'Level 3 warehouse';
                $id3 = 'Economy_09';
            }
            if ($qdataarray2[1] == 0) {
                $q4 = 'More resources';
                $id4 = 'Economy_02';
            } elseif ($qdataarray2[3] == 0) {
                $q4 = 'All in 1!';
                $id4 = 'Economy_04';
            } elseif ($qdataarray2[5] == 0) {
                $q4 = 'Market';
                $id4 = 'Economy_06';
            } elseif ($qdataarray2[7] == 0) {
                $q4 = 'All to 2!';
                $id4 = 'Economy_08';
            }
            //world//
            if ($qdataarray3[0] == 0) {
                $q5 = 'View statistics';
                $id5 = 'World_01';
            } elseif ($qdataarray3[2] == 0) {
                $q5 = 'Main Building Level 3';
                $id5 = 'World_03';
            } elseif ($qdataarray3[4] == 0) {
                $q5 = 'Open map';
                $id5 = 'World_05';
            } elseif ($qdataarray3[6] == 0) {
                $q5 = 'Gold Award';
                $id5 = 'World_07';
            } elseif ($qdataarray3[8] == 0) {
                $q5 = 'Main Building Level 5';
                $id5 = 'World_09';
            } elseif ($qdataarray3[10] == 0) {
                $q5 = 'Cultural Point';
                $id5 = 'World_11';
            } elseif ($qdataarray3[12] == 0) {
                $q5 = 'Reports Around You';
                $id5 = 'World_13';
            }
            if ($qdataarray3[1] == 0) {
                $q6 = 'Renaming the Village';
                $id6 = 'World_02';
            } elseif ($qdataarray3[3] == 0) {
                $q6 = 'Embassy Building';
                $id6 = 'World_04';
            } elseif ($qdataarray3[5] == 0) {
                $q6 = 'Read Message';
                $id6 = 'World_06';
            } elseif ($qdataarray3[7] == 0) {
                $q6 = 'union';
                $id6 = 'World_08';
            } elseif ($qdataarray3[9] == 0) {
                $q6 = 'Government headquarters';
                $id6 = 'World_10';
            } elseif ($qdataarray3[11] == 0) {
                $q6 = 'Warehouse to 7';
                $id6 = 'World_12';
            } elseif ($qdataarray3[13] == 0) {
                $q6 = 'Residence or palace level 10';
                $id6 = 'World_14';
            }

            ?>
            <li>
                <a href="#" class="quest" data-questId="<?php echo $id; ?>" data-category="battle"><?php echo $q1; ?></a>
            </li>
            <script type="text/javascript">
                Travian.Translation.add('answers.<?php echo $id; ?>_title', "Travian Answers");
            </script>
            <li>
                <a href="#" class="quest" data-questId="<?php echo $id2; ?>" data-category="battle"><?php echo $q2; ?></a>
            </li>
            <script type="text/javascript">
                Travian.Translation.add('answers.<?php echo $id2; ?>_title', "Travian Answers");
            </script>
            <li>
                <a href="#" class="quest" data-questId="<?php echo $id3; ?>" data-category="economy"><?php echo $q3; ?></a>
            </li>
            <script type="text/javascript">
                Travian.Translation.add('answers.<?php echo $id3; ?>_title', "Travian Answers");
            </script>
            <li>
                <a href="#" class="quest" data-questId="<?php echo $id4; ?>" data-category="economy"><?php echo $q4; ?></a>
            </li>
            <script type="text/javascript">
                Travian.Translation.add('answers.<?php echo $id4; ?>_title', "Travian Answers");
            </script>
            <li>
                <a href="#" class="quest" data-questId="<?php echo $id5; ?>" data-category="world"><?php echo $q5; ?></a>
            </li>
            <script type="text/javascript">
                Travian.Translation.add('answers.<?php echo $id5; ?>_title', "Travian Answers");
            </script>
            <li>
                <a href="#" class="quest" data-questId="<?php echo $id6; ?>" data-category="world"><?php echo $q6; ?></a>
            </li>
            <script type="text/javascript">
                Travian.Translation.add('answers.<?php echo $id6; ?>_title', "Travian Answers");
            </script>
            <?php
            }
            if ($_SESSION['qst'] == 0) {
            ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_01",
                            "name": "questV2.tutorial_01_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 1,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_01_step_01_layoutdescription"
                            }],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".dialog.questInformation .questButtonNext",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": "#questmasterButton",
                                "renderer": "rectangle"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 1) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: true,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_02",
                            "name": "questV2.tutorial_02_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 4,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_02_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_02_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_02_step_03_layoutdescription"
                                },
                                {
                                    "stepId": 3,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".dialog.questInformation .iconButton.small.cancel",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": "#questmasterButton",
                                "renderer": "rectangle"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 111111) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: true,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_02",
                            "name": "questV2.tutorial_02_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 2,
                            "stepCount": 4,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_02_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_02_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_02_step_03_layoutdescription"
                                },
                                {
                                    "stepId": 3,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".dialog.questInformation .questButtonTipsToggle",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": "#questmasterButton",
                                "renderer": "rectangle"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 3111) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_03",
                            "name": "questV2.tutorial_03_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 3,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_03_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_03_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".perspectiveResources #village_map .level.gid1.level0",
                            "renderer": "image"
                        },
                            {
                                "selector": ".perspectiveBuildings #navigation .inactive",
                                "renderer": "image"
                            },
                            {
                                "selector": ".perspectiveResources #closeContentButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 3) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_03",
                            "name": "questV2.tutorial_03_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 1,
                            "stepCount": 3,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_03_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_03_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".build .gid1.level0 button.build",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": ".perspectiveResources #village_map .level.gid1.level0",
                                "renderer": "image"
                            },
                            {
                                "selector": ".perspectiveBuildings #navigation .inactive",
                                "renderer": "image"
                            },
                            {
                                "selector": ".perspectiveResources #closeContentButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 4111) { ?>

            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_05",
                            "name": "questV2.tutorial_05_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 3,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_05_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_05_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".perspectiveResources #village_map .level.gid4.level0",
                            "renderer": "image"
                        },
                            {
                                "selector": ".perspectiveBuildings #navigation .inactive",
                                "renderer": "image"
                            },
                            {
                                "selector": ".perspectiveResources #closeContentButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 4) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_05",
                            "name": "questV2.tutorial_05_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 1,
                            "stepCount": 3,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_05_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_05_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".build .gid4.level0 button.build",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": ".perspectiveResources #village_map .level.gid4.level0",
                                "renderer": "image"
                            },
                            {
                                "selector": ".perspectiveBuildings #navigation .inactive",
                                "renderer": "image"
                            },
                            {
                                "selector": ".perspectiveResources #closeContentButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>

            <?php } elseif ($_SESSION['qst'] == 5) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_06",
                            "name": "questV2.tutorial_06_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 3,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_06_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_06_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".hero .attributesTab.normal",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": "#heroImageButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 51111) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_06",
                            "name": "questV2.tutorial_06_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 1,
                            "stepCount": 3,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_06_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_06_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".hero_inventory .openCloseSwitchBar .openedClosedSwitch.switchClosed",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": ".hero_inventory #saveHeroAttributes.clayClicked",
                                "renderer": "rectangle"
                            },
                            {
                                "selector": ".hero_inventory #setResource .resource.r2",
                                "renderer": "rectangle"
                            },
                            {
                                "selector": "#heroImageButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 6) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_07",
                            "name": "questV2.tutorial_07_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 1,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_07_step_01_layoutdescription"
                            }],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".perspectiveResources #navigation .inactive",
                            "renderer": "image"
                        },
                            {
                                "selector": ".perspectiveBuildings #closeContentButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 7) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_08",
                            "name": "questV2.tutorial_08_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 3,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_08_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_08_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".perspectiveBuildings #village_map .iso",
                            "renderer": "image"
                        },
                            {
                                "selector": "#build.gid0 .contentNavi .container.normal.infrastructure",
                                "renderer": "rectangle"
                            },
                            {
                                "selector": ".perspectiveResources #navigation .inactive",
                                "renderer": "image"
                            },
                            {
                                "selector": ".perspectiveBuildings #closeContentButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 71111) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_08",
                            "name": "questV2.tutorial_08_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 1,
                            "stepCount": 3,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_08_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_08_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": "#contract_building10 button.new",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": ".perspectiveBuildings #village_map .iso",
                                "renderer": "image"
                            },
                            {
                                "selector": "#build.gid0 .contentNavi .container.normal.infrastructure",
                                "renderer": "rectangle"
                            },
                            {
                                "selector": ".perspectiveResources #navigation .inactive",
                                "renderer": "image"
                            },
                            {
                                "selector": ".perspectiveBuildings #closeContentButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 8) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_09",
                            "name": "questV2.tutorial_09_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 3,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_09_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_09_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".perspectiveBuildings #village_map .building.g16e",
                            "renderer": "image"
                        },
                            {
                                "selector": ".perspectiveResources #navigation .inactive",
                                "renderer": "image"
                            },
                            {
                                "selector": ".perspectiveBuildings #closeContentButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 8111111) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_09",
                            "name": "questV2.tutorial_09_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 1,
                            "stepCount": 3,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_09_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_09_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".build #contract_building16 button.new",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": ".perspectiveBuildings #village_map .building.g16e",
                                "renderer": "image"
                            },
                            {
                                "selector": ".perspectiveResources #navigation .inactive",
                                "renderer": "image"
                            },
                            {
                                "selector": ".perspectiveBuildings #closeContentButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 9) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_10",
                            "name": "questV2.tutorial_10_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 2,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_10_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": "#finishNowDialog button",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": ".finishNow button",
                                "renderer": "rectangle"
                            },
                            {
                                "selector": "#closeContentButton",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 10) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_11",
                            "name": "questV2.tutorial_11_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 2,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_11_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".adventureSend button#start",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": ".hero .gotoAdventure",
                                "renderer": "rectangle"
                            },
                            {
                                "selector": ".hero .adventuresTab.normal",
                                "renderer": "rectangle"
                            },
                            {
                                "selector": "#sidebarBoxHero .adventureWhite",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 101111) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_11",
                            "name": "questV2.tutorial_11_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 2,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_11_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".adventureSend button#start",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": ".hero .gotoAdventure",
                                "renderer": "rectangle"
                            },
                            {
                                "selector": ".hero .adventuresTab.normal",
                                "renderer": "rectangle"
                            },
                            {
                                "selector": "#sidebarBoxHero .adventureWhite",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 11) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_12",
                            "name": "questV2.tutorial_12_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 3,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_12_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "task",
                                    "stepDescription": "questV2.tutorial_12_step_02_layoutdescription"
                                },
                                {
                                    "stepId": 2,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": "#content.reports .contentNavi .overview",
                            "renderer": "rectangle"
                        },
                            {
                                "selector": "#navigation #n5 a",
                                "renderer": "image"
                            }
                        ]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 13) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_14",
                            "name": "questV2.tutorial_14_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 2,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_14_step_01_layoutdescription"
                            },
                                {
                                    "stepId": 1,
                                    "type": "reward"
                                }
                            ],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": "#sidebarBoxQuestmaster button.bulbWhite",
                            "renderer": "image"
                        }]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } elseif ($_SESSION['qst'] == 14) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: [],
                        tutorialData: {
                            "id": "Tutorial_15",
                            "name": "questV2.tutorial_15_name",
                            "category": "tutorial",
                            "stepType": "task",
                            "currentStep": 0,
                            "stepCount": 1,
                            "steps": [{
                                "stepId": 0,
                                "type": "task",
                                "stepDescription": "questV2.tutorial_15_step_01_layoutdescription"
                            }],
                            "answersLink": "#"
                        },
                        highlightSelectors: [{
                            "selector": ".dialog.questInformation .questButtonNext",
                            "renderer": "rectangle"
                        }]
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php
            } elseif ($_SESSION['qst'] >= 15) { ?>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Game.Quest.setOptions({
                        tipsTurnoffAjaxTrigger: false,
                        listData: {
                            "battle": {
                                "questsTotal": 14,
                                "questsCompleted": <?php echo $totbattle; ?>,
                                "name": "Battle",
                                "quests": {
                                    "<?php echo $id; ?>": {
                                        "id": "<?php echo $id; ?>",
                                        "name": "questV2.<?php echo $id; ?>_name",
                                        "category": "battle",
                                        "stepType": "task",
                                        "currentStep": 0,
                                        "stepCount": 2,
                                        "steps": [{
                                            "stepId": 0,
                                            "type": "task",
                                            "stepDescription": null
                                        },
                                            {
                                                "stepId": 1,
                                                "type": "reward"
                                            }
                                        ],
                                        "answersLink": "#"
                                    },
                                    "<?php echo $id2; ?>": {
                                        "id": "<?php echo $id2; ?>",
                                        "name": "questV2.<?php echo $id2; ?>_name",
                                        "category": "battle",
                                        "stepType": "task",
                                        "currentStep": 0,
                                        "stepCount": 2,
                                        "steps": [{
                                            "stepId": 0,
                                            "type": "task",
                                            "stepDescription": null
                                        },
                                            {
                                                "stepId": 1,
                                                "type": "reward"
                                            }
                                        ],
                                        "answersLink": "#"
                                    }
                                }
                            },
                            "economy": {
                                "questsTotal": 12,
                                "questsCompleted": 0,
                                "name": "Economy",
                                "quests": {
                                    "<?php echo $id3; ?>": {
                                        "id": "<?php echo $id3; ?>",
                                        "name": "questV2.<?php echo $id3; ?>_name",
                                        "category": "economy",
                                        "stepType": "task",
                                        "currentStep": 0,
                                        "stepCount": 2,
                                        "steps": [{
                                            "stepId": 0,
                                            "type": "task",
                                            "stepDescription": null
                                        },
                                            {
                                                "stepId": 1,
                                                "type": "reward"
                                            }
                                        ],
                                        "answersLink": "#"
                                    },
                                    "<?php echo $id4; ?>": {
                                        "id": "<?php echo $id4; ?>",
                                        "name": "questV2.<?php echo $id4; ?>_name",
                                        "category": "economy",
                                        "stepType": "task",
                                        "currentStep": 0,
                                        "stepCount": 2,
                                        "steps": [{
                                            "stepId": 0,
                                            "type": "task",
                                            "stepDescription": null
                                        },
                                            {
                                                "stepId": 1,
                                                "type": "reward"
                                            }
                                        ],
                                        "answersLink": "#"
                                    }
                                }
                            },
                            "world": {
                                "questsTotal": 16,
                                "questsCompleted": 0,
                                "name": "World",
                                "quests": {
                                    "<?php echo $id5; ?>": {
                                        "id": "<?php echo $id5; ?>",
                                        "name": "questV2.<?php echo $id5; ?>_name",
                                        "category": "world",
                                        "stepType": "task",
                                        "currentStep": 0,
                                        "stepCount": 2,
                                        "steps": [{
                                            "stepId": 0,
                                            "type": "task",
                                            "stepDescription": null
                                        },
                                            {
                                                "stepId": 1,
                                                "type": "reward"
                                            }
                                        ],
                                        "answersLink": "#"
                                    },
                                    "<?php echo $id6; ?>": {
                                        "id": "<?php echo $id6; ?>",
                                        "name": "questV2.<?php echo $id6; ?>_name",
                                        "category": "world",
                                        "stepType": "task",
                                        "currentStep": 0,
                                        "stepCount": 2,
                                        "steps": [{
                                            "stepId": 0,
                                            "type": "task",
                                            "stepDescription": null
                                        },
                                            {
                                                "stepId": 1,
                                                "type": "reward"
                                            }
                                        ],
                                        "answersLink": "#"
                                    }
                                }
                            }
                        },
                        tutorialData: {},
                        highlightSelectors: {}
                    });

                    Travian.Game.Quest.bindMentorListDelegation();
                    Travian.Game.Quest.createHighlights();
                    Travian.Game.Quest.initializeQuests();
                });
            </script>
            <?php } ?>

        </div>
        <div class="innerBox footer"></div>
    </div>
</div>
<div class="clear"></div>
<?php
}

if (!isset($timer)) {
    $timer = 1;
}
$timestamp = $database->isDeleting($session->uid);
$displayarray = $database->getUser($session->uid, 1);

if ($timestamp) {

?>

<div id="sidebarBoxNews" class="sidebarBox toggleable <?php if (isset($_COOKIE['travian_toggle'])) {
    $class = explode(',', $_COOKIE['travian_toggle']);
    foreach ($class as $cs) {
        $expl = explode(':', $cs);
        if ($expl[0] == "gamenews") {
            echo $expl[1];
        }
        $i++;
    }
} else {
    echo "expanded";
}
?>">
    <div class="sidebarBoxBaseBox">
        <div class="baseBox baseBoxTop">
            <div class="baseBox baseBoxBottom">
                <div class="baseBox baseBoxCenter"></div>
            </div>
        </div>
    </div>
    <div class="sidebarBoxInnerBox">
        <div class="innerBox header ">
            <div class="boxTitle">
                <center><?php echo QS_ACCINFO; ?>
            </div>
        </div>
        <div class="innerBox content">
            <ul>
                <?php

                echo "<li class=\"\">";
                $time = $generator->getTimeFormat(($timestamp - time()));
                echo LL_DELETEIN . " <span id=\"timer" . $timer . "\">" . $time . "</span></td></tr>";
                echo "</li>";
                ++$timer;

                //echo "<li class=\"right\">";
                //echo "<b>Free Gold :</b> <br /> Enter Your Mobile Number if the number was correct we will send you extra gold code ( in 24 hrs )";
                //echo "<input name=\"tell\" placeholder=\"Your mobile number\">";
                //echo "</li>";
                ?>
            </ul>
        </div>
        <div class="innerBox footer">
            <button type="button" class="toggle" onclick="" title="<?php echo HS_HINFO; ?>">
                <div class="button-container addHoverClick"></div>
            </button>
            <script type="text/javascript">
                window.addEvent('domready', function() {
                    Travian.Translation.add({
                        'gamenews_collapsed': '<?php echo HS_DMINFO; ?>',
                        'gamenews_expanded': '<?php echo HS_HINFO; ?>'
                    });

                    var box = $('sidebarBoxNews');
                    box.down('button.toggle').addEvent('click', function(e) {
                        Travian.Game.Layout.toggleBox(box, 'travian_toggle', 'gamenews');
                    });
                });
            </script>
        </div>
    </div>
</div>
<?php
}
?>
