<?php
include ('simple_html_dom.php');

function get_usn($usn)
{
    $url = "http://results.vtu.ac.in/cbcs_17/result_page.php";
    $postdata = "usn=".$usn; 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt ($ch, CURLOPT_POSTFIELDS,$postdata);  
    curl_setopt ($ch, CURLOPT_POST, 1);
    $results = curl_exec($ch);
    curl_close ($ch);
    //$results = str_replace("<","&lt", $results);
    //$results = str_replace(">","&gt", $results);
    $html = new simple_html_dom();
    $html = str_get_html($results);
    $rtt =array();


       foreach($html->find('td') as $li)
       {
             $rtt=trim($li->innertext);
             echo $rtt;
             echo("<html><br></html>");

       
}

}


$start_seq = "1BI15CS";
for ($i=134;$i<142;$i++)
{

    $j = strlen((string)$i);


    if( $j== 1)
    {
        $roll = "00".(string)$i;
    }
    if($j == 2)
    {
        $roll = "0".(string)$i;
        }
        if($j == 3)
    {
       $roll = (string)$i;
    }
    

    $usn = $start_seq.$roll;

    get_usn($usn);
    
    }
    ?>
