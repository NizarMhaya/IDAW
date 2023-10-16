<?php
require_once("template_header.php");
require_once("template_menu.php");
$currentLang = 'fr';
if (isset($_GET['lang'])) {
    $currentLang = $_GET['lang'];
}

$currentPageId = 'accueil';
if (isset($_GET['page'])) {
    $currentPageId = $_GET['page'];
}

?>
<header class="bandeau_haut">
    <h1 class="titre">Hector Durand</h1>
</header>
<?php
renderMenuToHTML($currentPageId, $currentLang);
?>
<section class="corps">
    <?php
    $pageToInclude = $currentPageId . ".php";
    if (is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once("error.php");
    ?>
</section>
<?php
require_once("template_footer.php");
?>



<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>


<?php
require_once('template_footer.php');
?>

<?php
require_once('template_copyright.php');
?>