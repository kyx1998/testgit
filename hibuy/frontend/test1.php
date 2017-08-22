<?php
header("content-type:text/html;charset=utf-8");
$name=array(
    array('着火',50,'man'),
    array('我真是',60,'man'),
    array('老顽童',70,'woman')
);
$id=array(
    array('着火',60,'man'),
    array('我真是',60,'man'),
    array('老顽童',60,'woman')
);
$tableName = 'hb_product_style';
$sqlStr = "select *from hb_color,hb_size,hb_product,${tableName} WHERE hb_color.color_id = ${tableName}.color_id AND hb_size.size_id = ${tableName}.size_id AND hb_product.product_id = ${tableName}.product_id";
echo $sqlStr;
/*$a ='';
$b ='';
$c ='';
foreach($name as $info){
    $a .= $info[0];
    $b .= $info[1];
    $c .= $info[2];
}
echo $a.'<br>';
echo $b.'<br>';
echo $c.'<br>';
print_r($name);*/

/*$infos = explode('_',$info);
$name = $infos[0].'_name';
$id = $infos[0].'_id';
$sqlStr = " select $name from hb_$infos[0] as a,hb_product_style as b where a.$id=b.$id";
echo $sqlStr;*/



//print_r($name[3]);
/*for($i=0;$i<count($name);$i+=2){
    echo $name[$i][2];
    echo $name[$i+1][2];
}*/
/*$j=6;
for($i=0;$i<8;$i++){
    if($i<$j){
        echo $i;
    }else{
        echo '<br>'.$i;
    }
}*/

?>
<!--<script>
window.onload = function(){
//通过名字获取  getElementsByName
var obj = document.getElementsByName("fruit");
//通过标签获取  getElementsByTagName
    //var obj = document.getElementsByTagName("input");
    for(var i=0; i<obj.length; i ++){
        if(obj[i].checked){
            alert(obj[i].value);
        }
    }
}

</script>

<form>
<input type="radio"  name ="fruit" value="apple" checked>苹果
<input type="radio"  name ="fruit" value="banana">香蕉
<input type="radio"  name ="fruit" value="pear">梨
</form>-->



