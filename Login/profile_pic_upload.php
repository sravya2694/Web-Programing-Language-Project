<?php
include('templete_profile_pic.php');
echo 'Upload photo';


?>
<html>
<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

  $("#profileImage").click(function(e) {
    $("#imageUpload").click();
});
function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src',
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});
});

</script>
<style>

#imageUpload
{

}

#profileImage
{
  width: 150px;
    height: 150px;
    overflow: hidden;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
    cursor: pointer;
}

</style>
<form action="folders.php" method="post" enctype="multipart/form-data">

       <div style="position:absolute; left:38%; top:40%;">
       <image id="profileImage" src="default.png" />
     </div>
       <div style="position:absolute; left:40%; top:65%;">
     		<input type="file" name="file" id="imageUpload"/>
     	</div>

     	<div style="position:absolute; left:40%; top:70%; " id="upload">
     		<input type="submit" value="Upload" name="file" id="upload_button"/>
     	</div>
     </div>


</div>
</form>

</html>
