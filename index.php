<?php
require_once('model.php');
require_once('config.php');
require_once('./libs/model_sync.php');

var_dump(sync_model($conn, $model));