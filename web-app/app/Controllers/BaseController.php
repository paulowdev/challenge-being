<?php
namespace App\Controllers;

class BaseController
{
    const PATH_VIEW = "../app/Views/";

    /**
     * @param $view
     * @param array $data
     * @return mixed
     */
    protected function view($view, $data = [])
    {
        extract($data);
        return include(self::PATH_VIEW . $view);
    }

    public function getJsonSuccess($data = null, $message = null)
    {
        header_remove();
        http_response_code(200);
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        header('Content-Type: application/json');
        header('Status: ' . 200);

        $data = [
            'code' => 200,
            'message' => $message,
            'data' => $data,
        ];


        return json_encode($data);
    }

    public function getJsonError(\HttpResponseException $e, $message = null)
    {
        header_remove();
        http_response_code($e->getCode());
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        header('Content-Type: application/json');
        header('Status: ' . $e->getCode());

        $data = [
            'code' => $e->getCode(),
            'message' => $message ? $message : $e->getMessage(),
        ];

        return json_encode($data);
    }

}