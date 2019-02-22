 <?php
include "../member/dbConnect.php";

$key=$_GET['key'];
$query;
if($key==""|| $key==null || $key=="*"){
    $query="select * from image_content order by num desc";
}
else{
    $query="select * from image_content where userTxt like '%#%".$key."%' order by num desc";
}

$result=$conn->query($query);
if($result->num_rows!=0){
    while($row=$result->fetch_assoc()){
		
		$image=explode(",",$row['userimage']);
		
		echo     " <li class='col-4'>
                        <a href='view.php?num=".$row['num']."'<div class='gallery' style='background:url(".$image[0].") no-repeat 50%; background-size:cover'>
                        </div></a>
                        <div class='selectxt'>
                            
                            <div class='selectxts'>".$row['userTxt']."</div>
							<p>written by ".$row['userId']."</p><span>".$row['postingtime']."</span>
                        </div>
                    </li>";
    }
}
exit;

?>