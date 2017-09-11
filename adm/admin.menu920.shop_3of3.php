<?php
if (!defined('G5_USE_SHOP') || !G5_USE_SHOP) return;

array_push($menu['menu500'], array('500710', '상품가져오기', G5_ADMIN_URL.'/shop_admin/item_import.php', 'shop_import'));

array_push($menu['menu500'], array('500720', '상품내보내기', G5_ADMIN_URL.'/shop_admin/item_export.php', 'shop_export'));
?>