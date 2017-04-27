<?php
if (!defined('_GNUBOARD_')) exit;

$begin_time = get_microtime();

include_once(G5_PATH.'/head.sub.php');

function print_menu1($key, $no)
{
    global $menu;

    $str = print_menu2($key, $no);

    return $str;
}

function print_menu2($key, $no)
{
    global $menu, $auth_menu, $is_admin, $auth, $g5;

    $str .= "<ul class=\"gnb_2dul\">";
    for($i=1; $i<count($menu[$key]); $i++)
    {
        if ($is_admin != 'super' && (!array_key_exists($menu[$key][$i][0],$auth) || !strstr($auth[$menu[$key][$i][0]], 'r')))
            continue;

        if (($menu[$key][$i][4] == 1 && $gnb_grp_style == false) || ($menu[$key][$i][4] != 1 && $gnb_grp_style == true)) $gnb_grp_div = 'gnb_grp_div';
        else $gnb_grp_div = '';

        if ($menu[$key][$i][4] == 1) $gnb_grp_style = 'gnb_grp_style';
        else $gnb_grp_style = '';

        $str .= '<li class="gnb_2dli"><a href="'.$menu[$key][$i][2].'" class="gnb_2da '.$gnb_grp_style.' '.$gnb_grp_div.'">'.$menu[$key][$i][1].'</a></li>';

        $auth_menu[$menu[$key][$i][0]] = $menu[$key][$i][1];
    }
    $str .= "</ul>";

    return $str;
}
?>

<script>
var tempX = 0;
var tempY = 0;

function imageview(id, w, h)
{

    menu(id);

    var el_id = document.getElementById(id);

    //submenu = eval(name+".style");
    submenu = el_id.style;
    submenu.left = tempX - ( w + 11 );
    submenu.top  = tempY - ( h / 2 );

    selectBoxVisible();

    if (el_id.style.display != 'none')
        selectBoxHidden(id);
}
</script>

<div id="to_content"><a href="#container">본문 바로가기</a></div>

<header id="hd">
    <h1><?php echo $config['cf_title'] ?></h1>
    <div id="hd_top">
        <button type="button" id="btn_gnb" class="btn_gnb_close">메뉴</button>
       <div id="logo"><a href="<?php echo G5_ADMIN_URL ?>"><img src="<?php echo G5_ADMIN_URL ?>/img/logo.png" alt="<?php echo $config['cf_title'] ?> 관리자"></a></div>

        <div id="tnb">
            <ul>
                <li class="tnb_li"><a href="<?php echo G5_SHOP_URL ?>/" class="tnb_shop" target="_blank">쇼핑몰 바로가기</a></li>
                <li class="tnb_li"><a href="<?php echo G5_URL ?>/" class="tnb_community" target="_blank">커뮤니티 바로가기</a></li>
                <li class="tnb_li"><a href="<?php echo G5_ADMIN_URL ?>/service.php" class="tnb_service">부가서비스</a></li>
                <li class="tnb_li"><button type="button" class="tnb_mb_btn">관리자<span class="./img/btn_gnb.png">메뉴열기</span></button>
                    <ul class="tnb_mb_area">
                        <li><a href="<?php echo G5_ADMIN_URL ?>/member_form.php?w=u&amp;mb_id=<?php echo $member['mb_id'] ?>">관리자정보</a></li>
                        <li id="tnb_logout"><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <nav id="gnb" class="gnb_large">
        <h2>관리자 주메뉴</h2>
        <ul class="gnb_ul">
            <li class="gnb_li on">
                <button type="button" class="btn_op menu-1">환경설정</button>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>환경설정</h3>
                        <ul>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/config_form.php" class="on">기본환경설정</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/auth_list.php">관리권한설정</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/theme.php">테마설정</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/menu_list.php">메뉴설정</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/sendmail_test.php">메일테스트</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/newwinlist.php">팝업레이어관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/session_file_delete.php">세션파일 일괄삭제</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/cache_file_delete.php">캐시파일 일괄삭제</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/captcha_file_delete.php">캡챠파일 일괄삭제</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/thumbnail_file_delete.php">썸네일파일 일괄삭제</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/browscap.php">Browscap 업데이트</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/browscap_convert.php">접속로그 변환</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="gnb_li">
                <button type="button" class="btn_op menu-2">회원관리</button>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>회원관리</h3>
                        <ul>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/member_list.php">회원관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/mail_list.php">회원메일발송</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/visit_list.php">접속자집계</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/visit_search.php">접속자검색</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/visit_delete.php">접속자로그삭제</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/point_list.php">포인트관리 </a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/poll_list.php">투표관리 </a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="gnb_li">
                <button type="button" class="btn_op menu-3">게시판관리</button>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>게시판관리</h3>
                        <ul>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/board_list.php">게시판관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/boardgroup_list.php">게시판그룹관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/popular_list.php">인기검색어관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/popular_rank.php">인기검색어순위</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/qa_config.php">1:1문의설정</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/contentlist.php">내용관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/faqmasterlist.php">FAQ관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/write_count.php">글,댓글 현황</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="gnb_li ">
                <button type="button" class="btn_op menu-5">쇼핑몰관리</button>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3><a href="./index.php">쇼핑몰관리</a></h3>
                        <ul>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/configform.php">쇼핑몰설정</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/orderlist.php">주문내역</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/personalpaylist.php">개인결제 관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/categorylist.php">분류관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemlist.php">상품관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemqalist.php">상품문의</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemuselist.php">상품후기</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemstocklist.php">상품재고관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemtypelist.php">상품유형관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/optionstocklist.php">상품옵션재고관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/couponlist.php">쿠폰관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/couponzonelist.php">쿠폰존관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/sendcostlist.php">추가배송비관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/inorderlist.php">미완료주문</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            
             <li class="gnb_li">
                <button type="button" class="btn_op menu-6">쇼핑몰현황/기타</button>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>쇼핑몰현황/기타</h3>
                        <ul>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/sale1.php">매출현황</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemsellrank.php">상품판매순위</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/orderprint.php">주문내역출력</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemstocksms.php">재입고SMS 알림</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemevent.php">이벤트관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/itemeventlist.php">이벤트일괄처리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/bannerlist.php">배너관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/wishlist.php">보관함현황</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/price.php">가격비교사이트</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            
            <li class="gnb_li">
                <button type="button" class="btn_op menu-4">SMS관리</button>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>SMS관리</h3>
                        <ul>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/sms_admin/config.php">SMS 기본설정</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/sms_admin/member_update.php">회원정보업데이트</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/sms_admin/sms_write.php">문자 보내기</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/sms_admin/history_list.php">전송내역-건별</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/sms_admin/history_num.php">전송내역-번호별</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/sms_admin/form_group.php">이모티콘 그룹</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/sms_admin/form_list.php">이모티콘 관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/sms_admin/num_group.php">휴대폰번호 그룹</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/sms_admin/num_book.php">휴대폰번호 관리</a></li>
                            <li><a href="<?php echo G5_ADMIN_URL ?>/sms_admin/num_book_file.php">휴대폰번호 파일</a></li>
                        </ul>
                    </div>
                </div>
            </li>

        </ul>
    </nav>

</header>
<script>
$(function(){ 
    $(".tnb_mb_btn").click(function(){
        $(".tnb_mb_area").toggle();
    });

    $("#btn_gnb").click(function(){
        $("#container").toggleClass("container-small");
        $("#gnb").toggleClass("gnb_small");
        $("#btn_gnb").toggleClass("btn_gnb_open");
    });

    $(".gnb_ul li .btn_op" ).click(function() {
        $(this).parent().addClass("on").siblings().removeClass("on");
    });

});
</script>


<div id="wrapper">

    <div id="container">

        <h1 id="container_title"><?php echo $g5['title'] ?></h1>
        <div class="container_wr">