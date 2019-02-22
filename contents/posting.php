<?php
session_start();
$_SESSION['userId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>posting</title>
	<link rel="stylesheet" href="../css/grid.css">
	<link rel="stylesheet" href="../css/posting.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div id="wrap">
		<div class="center contents">
			<a href="mypage.php" class="arrow"><img src="../img/mybackarrow.png" alt="back"></a>
			<div class="gall">
			<img src="../img/plus.svg" alt="plus" id="img">
			</div>
			<div class="toupload">
			<a href="javascript:" onclick="fileUploadAction();" class="my_button">upload</a>	<input type="file" name="upload" id="upload" multiple/>
			</div>
			<div class="userTxts">
			
			<textarea name="userTxt" id="userTxt" cols="30" rows="10" placeholder="이곳에 글을 써주세요"></textarea>
			</div>
			<div class="save">
        <a href="javascript:" class="my_button" onclick="submitAction();">Save</a>
			</div>
	</div>
	</div>
</body>
<script>
    var sel_files=[];
    
    $(document).ready(function(){
        $('#upload').on('change',change);
    });
    
    function fileUploadAction(){
        $('#upload').trigger('click');
    }
    
    function change(e){
        sel_files=[];
        $('#img').hide();
		$('.gall').empty();
        
        var files=e.target.files;
        var filesArr=Array.prototype.slice.call(files);
        
        var index=0;
        filesArr.forEach(function(f){
            if(!f.type.match("image.*")){
                alert('이미지 확장자만 가능합니다!');
                return;
            }
            
            sel_files.push(f);
            
            var reader=new FileReader();
            reader.onload=function(e){
                var html="<a href=\"javascript:void(0);\" onclick=\"deleteImageAction("+index+")\" id=\"img_id_"+index+"\"><img src=\""+e.target.result+"\" data-file='"+f.name+"' class='selProductFile' title='Click to remove' width=100px; height=100px;></a>";
                $('.gall').append(html);
                index++;
            }
            reader.readAsDataURL(f);
        });
    }
    
    function deleteImageAction(index){
        sel_files.splice(index,1);
        
        var img_id='#img_id_'+index;
        $(img_id).remove();
    }
	
	function submitAction(){
		var data=new FormData();
		
		if(sel_files.length<1){
			alert("업로드할 파일을 선택하세요");
			return;
		}
		
		for(var i=0, len=sel_files.length; i<len; i++){
			var name="image_"+i;
			data.append(name,sel_files[i]);
		}
		data.append("image_count", sel_files.length);
		data.append("userTxt",$('#userTxt').val());
		
		var xhr=new XMLHttpRequest();
		xhr.open("POST","postingOk.php");
		xhr.onload=function(e){
			if(this.status==200){
				console.log("result: "+e.currentTarget.responseText);
				
				alert(e.currentTarget.responseText);
				location.href='select.php';
			}
		}
		xhr.send(data);
	}
	</script>
	
</html>
