<?Php
function payment($fees, $tel, $names, $redirectUrl, $refId)
{

    $api = new apicaller();
    $data = ['tx_ref' => $refId, 'amount' => $fees, 'currency' => 'RWF', "network" => "MTN", 'email' => 'lostandfound@gmail.com', 'phone_number' => $tel, 'fullname' => $names, 'redirect_url' => $redirectUrl,];
    $result = $api->post($data, "https://api.flutterwave.com/v3/charges?type=mobile_money_rwanda");
    $result = $result['meta']['authorization']['redirect'];
    $redirect = 'location:' . $result;
    header($redirect);
}
