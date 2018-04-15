<?php
/**
 * Created by IntelliJ IDEA.
 * User: raahil
 * Date: 4/13/2018
 * Time: 3:18 PM
 */

require_once("BaseHandler.php");
require_once("letterChart.php");

class Handler extends BaseHandler
{
    public function encodeHtml($responseData){
        $htmlResponse = "<table border='1'>";
        foreach($responseData as $key=>$value){
            $htmlResponse .= "<tr><td>". $key . "</td><td>" . $value . "</td></tr>";
        }
        $htmlResponse .= "</table>";
        return $htmlResponse;
    }
    public function encodeJson($responseData) {
        $jsonResponse = json_encode($responseData);
        return $jsonResponse;
    }

    public function encodeXml($responseData) {
        // creating object of SimpleXMLElement
        $xml = new SimpleXMLElement('<?xml version="1.0"?><mobile></mobile>');
        foreach($responseData as $key=>$value) {
            $xml->addChild($key, $value);
        }
        return $xml->asXML();
    }


    public function decrypt($word){
        $letterChart = new letterChart();
        $rawData = $letterChart->decrypt($word);

        if(empty($rawData)){
            $statusCode = 404;
            $rawData = array('error' => 'encrypting failed');
        } else{
            $statusCode = 200;
        }

        $requestContentType = $_SERVER['HTTP_ACCEPT'];

        $this -> setHttpHeaders('application/json', $statusCode);


        /*if(strpos($requestContentType, 'application/json') !== false){
            $response = $this->encodeJson($rawData);
            echo $response;
        }
        else if(strpos($requestContentType, 'text/html') !== false){
            $response = $this->encodeHtml($rawData);
            echo $response;
        }
        else if(strpos($requestContentType, 'application/xml') !== false){
            $response = $this->encodeXml($rawData);
            echo $response;
        }*/
        $response = $this->encodeJson($rawData);
        echo $response;
    }

    public function encrypt($word){
        $letterChart = new letterChart();
        $rawData = $letterChart->encrypt($word);

        if(empty($rawData)){
            $statusCode = 404;
            $rawData = array('error' => 'encrypting failed');
        } else{
            $statusCode = 200;
        }

        $requestContentType = $_SERVER['HTTP_ACCEPT'];

        $this -> setHttpHeaders('application/json', $statusCode);

        /*if(strpos($requestContentType, 'application/json') !== false){
            $response = $this->encodeJson($rawData);
            echo $response;
        }
        else if(strpos($requestContentType, 'text/html') !== false){
            $response = $this->encodeHtml($rawData);
            echo $response;
        }
        else if(strpos($requestContentType, 'application/xml') !== false){
            $response = $this->encodeXml($rawData);
            echo $response;
        }*/
        $response = $this->encodeJson($rawData);
        echo $response;

    }
}
