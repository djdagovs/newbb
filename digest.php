<?php
/**
 * NewBB 4.3x, the forum module for XOOPS project
 *
 * @copyright      XOOPS Project (http://xoops.org)
 * @license        http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author         Taiwen Jiang (phppp or D.J.) <phppp@users.sourceforge.net>
 * @since          4.00
 * @package        module::newbb
 */

// Why the skip-DB-security check defined only for XMLRPC? We also need it!!! ~_*
if (!defined('XOOPS_XMLRPC')) {
    define('XOOPS_XMLRPC', 1);
}
ob_start();
include_once __DIR__ . '/header.php';
if (0 == $GLOBALS['xoopsModuleConfig']['email_digest']) {
    echo '<br>Not set';

    return false;
}
$digestHandler = xoops_getModuleHandler('digest', 'newbb');
$msg           = $digestHandler->process();
$msg .= ob_get_contents();
ob_end_clean();
echo '<br>' . $msg;
