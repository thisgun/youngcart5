<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
?>

<header id="hd">
    <?php if ((!$bo_table || $w == 's' ) && defined('_INDEX_')) { ?><h1><?php echo $config['cf_title'] ?></h1><?php } ?>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>

    <div id="hd_wr">
        <div id="logo"><a href="<?php echo G5_SHOP_URL; ?>/"><img src="<?php echo G5_DATA_URL; ?>/common/mobile_logo_img" alt="<?php echo $config['cf_title']; ?> 메인"></a></div>
        <div id="hd_btn">
            <button type="button" id="btn_hdcate"><i class="fa fa-bars" aria-hidden="true"></i><span class="sound_only">분류</span></button>
            <button type="button" id="btn_hdmy"><i class="fa fa-user" aria-hidden="true"></i><span class="sound_only">마이메뉴</span></button>
            <a href="<?php echo G5_SHOP_URL; ?>/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="sound_only">장바구니</span><span class="cart-count"><?php echo get_cart_count($tmp_cart_id); ?></span></a>

        </div>
    </div>
    <?php include_once(G5_THEME_MSHOP_PATH.'/category.php'); // 분류 ?>

    <?php include_once(G5_THEME_MSHOP_PATH.'/mymenu.php'); // 마이메뉴 ?>

    <script>
    $("#btn_hdcate").on("click", function() {
        $("#category").show();
    });

    $("#btn_hdmy").on("click", function() {
        $("#mymenu").show();
    });

    $(".menu_close").on("click", function() {
        $(".menu").hide();
    });
   </script>
</header>

<div id="container">
    <?php if ((!$bo_table || $w == 's' ) && !defined('_INDEX_')) { ?><h1 id="container_title"><?php echo $g5['title'] ?></h1><?php } ?>
