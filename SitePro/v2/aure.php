<?php
    function renderMenuToHTML($currentPageId)
    {
        // un tableau qui d'efinit la structure du site
        $mymenu = array(
            // idPage titre
            'index' => array('Accueil'),
            'cv' => array('Cv'),
            'projets' => array('Mes Projets'),
            'info_pratiques' => array('Infos Pratiques')
        );

        echo '<div class="leftSide">
        <nav class="menu">';

        foreach ($mymenu as $pageId => $pageParameters) {
            if ($pageId == $currentPageId) {
                echo '<a class="indexClick" id=currentpage href="' . $pageId . '.php">' . $pageParameters[0] . '</a>';
            } else {
                echo '<a class="indexClick" href="' . $pageId . '.php">' . $pageParameters[0] . '</a>';
            }
        }

        echo '</nav>
        </div>';
    }
