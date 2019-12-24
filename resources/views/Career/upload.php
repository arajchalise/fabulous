<?php 

if(isset($_FILE['upload']['name'])){
    move_uploaded_file($_FILE['upload']['tmp_name'], 'images/CKUploads/'.$_FILE['upload']['name']);
}

?>
