<?php
/**
 * Plugin Name: N1ED
 * Plugin URI:  https://n1ed.com
 * Description: #1 editor for your content. Create and edit in WYSIWYG style responsive content based on Bootstrap framework
 * Version:     1.1.0
 * Author:      EdSDK
 * Author URI:  https://n1ed.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: n1ed
 * Domain Path: /languages
 */

/**
 * N1ED — #1 editor for your content. Create and edit in WYSIWYG style responsive content based on Bootstrap framework.
 * @encoding     UTF-8
 * @version      1.1.0
 * @license      GPLv2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @copyright    Copyright (c) 2019 EdSDK (https://n1ed.com/). All rights reserved.
 * @support      support@n1ed.zendesk.com
 **/

require 'lib/action/req/Req.php';

require 'lib/action/resp/FileData.php';
require 'lib/action/resp/Message.php';
require 'lib/action/resp/Resp.php';

require 'lib/action/AAction.php';
require 'lib/action/AActionUploadId.php';
require 'lib/action/ActionError.php';
require 'lib/action/ActionUploadAddFile.php';
require 'lib/action/ActionUploadCancel.php';
require 'lib/action/ActionUploadCommit.php';
require 'lib/action/ActionUploadInit.php';
require 'lib/action/ActionUploadRemoveFile.php';

require 'lib/config/IConfig.php';

require 'lib/file/Utils.php';
require 'lib/file/UtilsPHP.php';
require 'lib/file/URLDownloader.php';
require 'lib/file/AFile.php';
require 'lib/file/FileUploaded.php';
require 'lib/file/FileCommited.php';

require "servlet/UploaderServlet.php";
require 'servlet/ServletConfig.php';

require 'lib/Actions.php';
require 'lib/JsonCodec.php';
require 'lib/MessageException.php';
require 'lib/Uploader.php';

require "config.php";

define('ROOTPATH', dirname(__FILE__));
error_reporting(E_ALL);
ini_set("display_errors", 0);

try {
    $servlet = new UploaderServlet();
    $servlet->init($config);
    $servlet->doPost($_POST, $_FILES);
} catch (Exception $e) {
    error_log($e);
    throw $e;
}
