<?php

namespace Tests\Feature;

use Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;


class MakePay extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
public function test_make_pay(){

//create the new instance of GuzzleHttp\Client     
$client = new \GuzzleHttp\Client();

//create the variables list of parameters
$params="authentication.memberId=11344" .
        "&authentication.checksum=3d1079465e8f3ffef07c086605289df1" .
        "&authentication.terminalId=1106" .
        "&merchantTransactionId=Rest Transaction 01" .
        "&amount=50.00" .
        "&currency=USD" .
        "&orderDescriptor=Test Transaction" .
        "&shipping.country=IN" .
        "&shipping.city=Malad" .
        "&shipping.state=MH" .
        "&shipping.postcode=400064" .
        "&shipping.street1=Malad" .
        "&customer.telnocc=091" .
        "&customer.phone=9854789658" .
        "&customer.email=john.doe@xyz.com" .
        "&customer.givenName=John" .
        "&customer.surname=Doe" .
        "&customer.ip=192.168.0.1" .
        "&customer.birthDate=19890202" .
        "&card.number= 4000000000000051" .
        "&card.expiryMonth=07" .
        "&card.expiryYear=2022" .
        "&card.cvv=745" .
        "&paymentBrand=VISA" .
        "&paymentMode=CC" .
        "&paymentType=DB" .
        "&merchantRedirectUrl=https://www.merchantRedirectUrl.com" .
        "&notificationUrl=www.merchantNotificationUrl.com" .
        "&tmpl_amount=50.00" .
        "&tmpl_currency=USD" .
        "&recurringType=INITIAL" .
        "&createRegistration=true" .
        "&customer.customerId=12345";

//make the json encoding of parameters
$data = json_encode($params);

//create the request object to make the call of GuzzleHttp\Client instanse 
//it uses the URL and encoded data
$request = $client->post('https://preprod.shimotomo.com/transactionServices/REST/v1/payments', null, json_encode($data));

//add auth token to the new request
$request->addHeader('X-Authorization', 'AuthToken :eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJjb25tZXJjaGFudDEiLCJyb2xlIjoibWVyY2hhbnQiLCJpc3MiOiJQWiIsImV4cCI6MTUwMTE0NjY0MX0.TFmGGKDUgkktmZQvrUTeox1buH1J6lgBVE3Mcy8OVjA');


//get the response of request of GuzzleHttp\Client
$response = $request->send();

//testing the request response code:200 is OK
$this->assertEquals(200, $response->getStatusCode());

//testing the header on exists X-Auth in header
$this->assertTrue($response->hasHeader('X-Authorization'));

//geting the json encoded data 
$resp_data = json_decode($response->getBody(true), true);

//checking are existing at the response list of variables
$this->assertArrayHasKey('memberId', $resp_data);
$this->assertArrayHasKey('email', $resp_data);
$this->assertArrayHasKey('surname', $resp_data);
$this->assertArrayHasKey('amount', $resp_data);
 
}



}
