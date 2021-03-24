<?php ?>
<head>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
    <!-- jQuery UI 排序 -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

    <style>
        button{
            margin: 5px;
        }

        table{
            margin: 5px;
        }
    </style>

</head>

<form>
    <button type="button" class="btn btn-sm btn-success add"><i class="fa fa-plus" aria-hidden="true"></i> 新增刪除碼</button>
    <table border="1" id="mt">
        <thead>
        <tr>
            <th>仲介費實績</th>
            <th colspan="8">項目</th>
        </tr>
        <tr>
            <th>排序</th>
            <th>AG達人</th>
            <th>店別</th>
            <th>仲介業績</th>
            <th>仲介獎金</th>
            <th>代管業績</th>
            <th>代管獎金</th>
            <th>性質(新增add/修改up)</th>
            <th>刪除</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <button type="button" id="send" class="btn btn-primary">送出</button>
</form>



<!-- Bootstrap core JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- jQuery UI 排序 -->
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>
    $(document).ready(function(){

        //原先舊的資料可以拖拉排序
        $( "tbody" ).sortable();

        //增加
        $('.add').click(function(){
            $('#mt tbody').append('<tr class="items">'+
                                    '<td><i class="fa fa-arrows-alt" aria-hidden="true"></i></td>'+
                                    '<td><input type="text" class="item_AG"></td>'+
                                    '<td><input type="text" class="item_STORE"></td>'+
                                    '<td><input type="text" class="item_AGA"></td>'+
                                    '<td><input type="text" class="item_AGMONEY"></td>'+
                                    '<td><input type="text" class="item_READ"></td>'+
                                    '<td><input type="text" class="item_READMONEY"></td>'+
                                    '<td><input type="text" class="item_upd" value="add" readonly></td>'+
                                    '<td><button type="button" class="btn btn-sm btn-danger delete_item"><i class="fa fa-trash"></i></button></td>'+
                                    '</tr>)');    
            //新資料要能拖拉排序                        
            $( "tbody" ).sortable();                                    
        });

        //刪除欄位
        $('form').on("click",'.delete_item',function(){
            $(this).closest('tr').remove();
        });

        //送出前取值
        $("#send").on("click",function(){

              let items = [];
              $('.items').each(function(){
                  
                  var item_AG        = $(this).find('.item_AG').val();
                  var item_STORE     = $(this).find('.item_STORE').val();
                  var item_AGA       = $(this).find('.item_AGA').val();
                  var item_AGMONEY   = $(this).find('.item_AGMONEY').val();
                  var item_READ      = $(this).find('.item_READ').val();
                  var item_READMONEY = $(this).find('.item_READMONEY').val();
                  var item_upd       = $(this).find('.item_upd').val();

                  if( (item_AG!="")||(item_STORE!="")||(item_AGA!="")||(item_AGMONEY!="")||(item_READ!="")||(item_READMONEY!="") )
                  {
                    items.push({item_AG:item_AG,
                                item_STORE:item_STORE,
                                item_AGA:item_AGA,
                                item_AGMONEY:item_AGMONEY,
                                item_READ:item_READ,
                                item_READMONEY:item_READMONEY,
                                item_upd:item_upd
                                });
                  }

              });

            //方法1:用form傳送
              $('body').append('<form id="textform" style="display:none"></form>');
              $("#textform").attr('method','post');
              $("#textform").attr('action','access.php');
              //$("#textform").attr('enctype','multipart/form-data');
              $("#textform").append('<textarea style="display:none" name="items" id="items" >'+JSON.stringify(items)+'</textarea>');
              $("#textform").submit();

            // console.log(items);
            // console.log(JSON.stringify(items));

            //方法2:用ajax傳送
            //   $.ajax({
            //         url: 'access.php',
            //         method: "POST",
            //         dataType: "json",
            //         data: {
            //         items
            //         },
            //     })
            //     .done(function(response) 
            //     {
            //         console.log(response.msg);
            //     });         
        });
    })  
</script>