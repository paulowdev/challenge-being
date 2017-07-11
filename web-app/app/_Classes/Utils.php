<?php
namespace App\_Classes;


class Utils
{


    const PATH_EXCEL_FILES = "../public/uploads/excel-files/";

    static function sendEmail($email, $filePath)
    {

        $subject = 'Converted excel file link';
        $body = 'Hi,<br/>the converted file is attached.<br/>Thanks.';

        $mail = new Mail(new \PHPMailer());
        $mail->send($email, $subject, $body, $filePath);
    }

    /**
     * @param $file
     * @return mixed
     */
    static function converterAndUploadFile($file)
    {
        $isValid = false;
        $types = array('Excel2003XML', 'Excel2007', 'Excel5', 'CSV');
        $newFilename = null;

        try {

            foreach ($types as $type) {
                $reader = \PHPExcel_IOFactory::createReader($type);
                if ($reader->canRead($file['tmp_name'])) {
                    $isValid = true;
                    break;
                }
            }

            if ($isValid) {
                $excelFile = $reader->load($file['tmp_name']);
                $writerFile = \PHPExcel_IOFactory::createWriter($excelFile, 'CSV');
                $newFilename = substr(str_shuffle(MD5(microtime())), 0, 15) . '.csv';

                if (!file_exists(self::PATH_EXCEL_FILES . $newFilename)) {
                    chmod(self::PATH_EXCEL_FILES, 0777);
                }

                $writerFile->save(self::PATH_EXCEL_FILES . $newFilename);
            }

            return array('filename' => $newFilename, 'filePath' => self::PATH_EXCEL_FILES . $newFilename);

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }


    static function fileValidation($file)
    {

        $fileType = substr($file['name'], strrpos($file['name'], '.') + 1);

        $allowedExtensions = array("xls", "xlsx", "csv");

        $isAllowed = false;
        foreach ($allowedExtensions as $ext) {
            if (strcasecmp($ext, $fileType) == 0) {
                $isAllowed = true;
            }
        }

        if (!$isAllowed) {

            $msg = "The uploaded file is not supported file type. " .
                " Only the following file types are supported: " . implode(',', $allowedExtensions);

            $data = [
                'code' => 409,
                'message' => $msg,
            ];

            return json_encode($data);
        }

    }

}