<?php
require_once('template_pre_header.php');
require_once('template_header.php');
renderMenuToHTML($currentPageId)
?>


<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 ms-auto">
                <p class="lead">Nizar Mhaya est un petit génie comme on en voit rarement. Né dans la petite ville paisible de Clamart, Nizar était destiné à briller dès son plus jeune âge. Son incroyable intelligence et sa curiosité insatiable étaient évidentes pour tous ceux qui le connaissaient. Dès qu'il a commencé à parler, il posait des questions sur le monde qui l'entourait, montrant une soif inextinguible de connaissances.</p>
            </div>
            <div class="col-lg-4 me-auto">
                <p class="lead">En grandissant, Nizar a développé un intérêt particulier pour les sciences et la technologie. Il passait des heures à démonter et à réassembler des appareils électroniques, à coder des programmes informatiques sophistiqués et à explorer les mystères de l'univers. Ses talents en mathématiques étaient exceptionnels. Mais son imagination surpassait tout cela, comme le prouvent ces deux paragraphes fantasmagoriques.</p>
            </div>
        </div>
        <!-- About Section Button-->
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light" href="https://aoe2recs.com/">
                <i class="fas fa-download me-2"></i>
                Best site ever
            </a>
        </div>
    </div>
</section>

<!-- Footer-->
<?php
require_once('template_footer.php');
?>
<?php
require_once('template_copyright.php');
?>