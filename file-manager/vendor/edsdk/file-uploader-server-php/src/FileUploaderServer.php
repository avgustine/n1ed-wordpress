<?php
/**
 * N1ED — #1 editor for your content. Create and edit in WYSIWYG style responsive content based on Bootstrap framework.
 * @encoding     UTF-8
 * @version      1.2.0
 * @license      GPLv2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @copyright    Copyright (c) 2019 EdSDK (https://n1ed.com/). All rights reserved.
 * @support      support@n1ed.zendesk.com
 **/

namespace EdSDK\FileUploaderServer;

use EdSDK\FileUploaderServer\servlet\UploaderServlet;
use Exception;

class FileUploaderServer {

    static function fileUploadRequest($config) {

        try {
            $servlet = new UploaderServlet();
            $servlet->init($config);
            $servlet->doPost($_POST, $_FILES);
        } catch (Exception $e) {
            error_log($e);
            throw $e;
        }

    }

}