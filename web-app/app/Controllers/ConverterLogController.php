<?php
namespace App\Controllers;

use App\_Classes\Utils;
use App\Models\ConverterLog;

class ConverterLogController extends BaseController
{

    protected $model;

    public function __construct()
    {
        $this->model = new ConverterLog();
    }


    public function save()
    {

        try {

            if (empty($_POST)) {
                $_POST = json_decode(file_get_contents("php://input"), true) ?: [];
            }

            if ($_POST) {

                //  Converting and upload file
                if (isset($_FILES['file'])) {
                    Utils::fileValidation($_FILES['file']);
                    $csvFile = Utils::converterAndUploadFile($_FILES['file']);
                }

                // Save model in database
                $this->model->setEmail($_POST['email']);
                $this->model->setFilename($csvFile['filename']);
                $this->model->save();

                // Send email
                @Utils::sendEmail($_POST['email'], $csvFile['filePath']);

                echo $this->getJsonSuccess(['filename' => $csvFile['filename']], "Excel file converted and send successfully!");
            }

        } catch (\HttpResponseException $e) {
            echo $this->getJsonError($e);
        }
    }

}