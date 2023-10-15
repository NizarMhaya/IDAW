<?php
function renderMenuToHTML($currentPageId)
{
    // un tableau qui définit la structure du site

    $mymenu = array(
        // idPage titre
        'portfolio' => array('Portfolio'),
        'about' => array('About'),
        'contact' => array('Contact')

    );
    echo '<!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php">Nizar Mhaya</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">';
    // ...
    foreach ($mymenu as $pageId => $pageParameters) {
        $link = 'index.php?page=' . $pageId;
        if ($pageId == $currentPageId) {
            echo '<li id="currentpage" class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="' . $link . '">' . $pageParameters[0] . '</a></li>';
        } else {
            echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="' . $link . '">' . $pageParameters[0] . '</a></li>';
        }
    }

    echo '</ul>
</div>
</div>
</nav>';
    //}
    // ...
}
