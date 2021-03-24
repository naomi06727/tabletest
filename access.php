<?php

/**方法1:用form傳送
 * 
 * 
 * */
$items = json_decode($_POST['items'],true);

echo "<pre>".print_r($items, true)."</pre>";exit;
if($items)
{
    foreach($items as $item)
    {
        if($item['item_upd']=='add')
        {
            $sql = "insert into........";
        }
        elseif($item['item_upd']=='up')
        {
            $sql = "update ...... set........";
        }
    }
}


/**方法2:用ajax傳送
 * 
 * */
// $items = $_POST['items'];
// echo "<pre>".print_r($items, true)."</pre>";exit;

// if($items)
// {
//     foreach($items as $item)
//     {
//         if($item['item_upd']=='add')
//         {
//             $sql = "insert into........";
//         }
//         elseif($item['item_upd']=='up')
//         {
//             $sql = "update ...... set........";
//         }
//     }
// }

// header('Content-Type: application/json; charset=utf-8');
// echo json_encode(array('status'=>'success','msg' => '上傳/更新完畢'));
// exit;	


?>