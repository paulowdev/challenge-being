<?php
require '../bootstrap/bootstrap.php';
use App\Controllers\ConverterLogController;


// Converter controller
$converterController = new ConverterLogController();
$converterController->save();
