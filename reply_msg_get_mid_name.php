<html>
    999
<title>@ME</title>

<h1 align = 'center'>@ME</h1>
    <P align=center>
        <img src="http://qr-official.line.me/L/oUypr1a-r8.png">
    </P>
    <div align=center>line@ffon</div>


<?php
function get_name($mid = null)
{
    
    $proxy = 'if_u_want_to_fix_url';
    $proxyauth = 'if_u_want_to_fix_url';   
    $strAccessToken = "Token";
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/profile/$mid";
    $header = array(
    'Content-Type: appl
    ication/json',
    'Authorization: Bearer ' . $strAccessToken
    );
    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, $strUrl);
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
// curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    echo "this is  result get name";
    var_dump($result);
    
    return $result;
}
function get_mid()
{
    $proxy = 'if_u_want_to_fix_url';
    $proxyauth = 'if_u_want_to_fix_url';   
    $strAccessToken = "Token";
       
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/message/reply";
    
    $arrHeader = array();
    $arrHeader[] = "Content-Type: application/json";
    $arrHeader[] = "Authorization: Bearer {$strAccessToken}";

    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
    $get_mid =  $arrJson['events'][0]['source']['userId'];
    $mid = get_name($get_mid);
    echo "get_mid";
    var_dump($get_mid);
       
        
    if ($arrJson['events'][0]['message']['text'] == "a") {
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = "สวัสดี ".$arrJson['events'][0]['source']['userId'];
        $get_mids =  $arrJson['events'][0]['source']['userId'];
        $mid = get_name($get_mids);
        echo "get_mid if";
        var_dump($get_mids);
            
        $chAdd = curl_init();
        curl_setopt($chAdd, CURLOPT_URL, 'url?mid='.$get_mid.'&line_name='.$name.'&image='.$image.'&add_by=1');
        curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
        //curl_setopt($chAdd,CURLOPT_RETURNTRANSFER , true);
        curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
                                            )
        );
        $results = curl_exec($chAdd);
        $err    = curl_error($chAdd);
        curl_close($chAdd);
        echo "result dx";
        var_dump($results);
    }
        
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
    $result = curl_exec($ch);
    curl_close ($ch);
        
    echo "result";
    var_dump($result);
}
    get_mid();
    
            
    
    ?>
    
    </html>
