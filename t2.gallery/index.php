<?php 
    $page_title = "T2 Studios - Gallery";
    include_once './source/base_head.php'; 
?>
<!-- Page Wrapper -->
<div id="page" class="animsition equal" data-loader-type="loader2" data-page-loader-text="T2 Gallery" data-animsition-in="fade-in-up-sm" data-animsition-out="fade-out-up-sm" style="transform-origin: 50% 50vh;">
    <div id="top"></div>
    <!-- Home Section -->
    <?php include './source/landing_intro.php'; ?>
    <!--/ End Home Section -->
    <!-- Navbar -->
    <?php include './source/nav.php'; ?>
    <!--/ End Navbar -->
    <div id="page-2">
        <?php require "./source/about_section.php"; ?>
        <hr />
        <?php require "./source/service_section.php"; ?>
        <hr />
        <?php require "./source/portfolio_section1.php"; ?>
        <?php require "./source/team_section1.php"; ?>
        <hr />
        <?php require "./source/testimonials_section.php"; ?>
        <hr />
        <?php require "./source/contact_section.php"; ?>
        <!-- < ?php require "./source/map_section.php"; ?> -->
        <!-- Footer Section -->
        <?php include './source/footer_social_section.php';?>
        <!--/ End Footer Section -->
    </div>
    <!--/ #page-2 -->
</div>
<!--/ #page -->
<!-- JS Scripts -->
<!--< ?php include_once("analyticstracking.php") ?>-->
<?php include_once './source/footer.php'; ?>
<!--/ End JS Scripts -->
