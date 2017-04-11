<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<div id="mymenu" class="menu">
        <button type="button" class="menu_close"><span class="sound_only">카테고리 </span>닫기</button>
        <?php echo outlogin('theme/basic'); // 외부 로그인 ?>
         <ul id="hd_tnb">
            <li class="bd"><a href="<?php echo G5_SHOP_URL; ?>/mypage.php"><i class="fa fa-user" aria-hidden="true"></i><br>마이페이지</a></li>
            <li class="bd"><a href="<?php echo G5_SHOP_URL; ?>/couponzone.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i><br>쿠폰존</a></li>
            <li class="bd"><a href="<?php echo G5_BBS_URL; ?>/faq.php"><i class="fa fa-question-circle" aria-hidden="true"></i><br>FAQ</a></li>
            <li><a href="<?php echo G5_BBS_URL; ?>/qalist.php"><i class="fa fa-comments" aria-hidden="true"></i><br>1:1문의</a></li>
            <?php
            if(G5_COMMUNITY_USE) {
                $com_href = G5_URL;
                $com_name = '커뮤니티';
            } else {
                if(!preg_match('#'.G5_SHOP_DIR.'/#', $_SERVER['SCRIPT_NAME'])) {
                    $com_href = G5_SHOP_URL;
                    $com_name = '쇼핑몰';
                }
            }

            if($com_href && $com_name) {
            ?>
            <li><a href="<?php echo $com_href; ?>/"><i class="fa fa-users" aria-hidden="true"></i><br> <?php echo $com_name; ?></a></li>
            <?php } ?>
            <li><a href="<?php echo G5_SHOP_URL; ?>/personalpay.php"><i class="fa fa-key" aria-hidden="true"></i><br>개인결제</a></li>
            <?php if(!$com_href || !$com_name) { ?>
            <li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=5"><br>세일상품</a></li>
            <?php } ?>
        </ul> 

        <?php include(G5_MSHOP_SKIN_PATH.'/boxtodayview.skin.php'); // 오늘 본 상품 ?>
</div>