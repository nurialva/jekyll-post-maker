<?php
/**
 * update $base_url with your relative jekyll-blog directory
 * update timezone with yours
 **/

date_default_timezone_set("Asia/Jakarta");

if ( is_dir ( ".git") ) {
	echo "pp";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Jekyll Post Maker">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Jekyll Post Maker </title>
	<link href="/assets/css/materialize.min.css" rel="stylesheet" >
</head>
<body class="container">
<?php

	if ( isset ( $_POST['publish'] ) ) {

		$title = $_POST['title'];
		$content = $_POST['content'];
		$category = $_POST['category'];
		$filename = date('Y-m-d')."-".strtolower ( str_replace (" " , "-" , $title ) ) . ".markdown";
		$date = date('Y-m-d h:i:s');

	$fc = 
"---
layout: post
title: {$title}
date: {$date}
categories: {$category}
---
{$content}
";

	file_put_contents (  "../_posts/".$filename, $fc );
		
		
	}
     function ck_editor ($name=null,$val=null) {
     		echo '<script src="/assets/js/ckeditor.js"></script>';
     		echo '<div class="col s12 input-field">';
     		echo "<textarea id='editor' name='content'>$val</textarea></div>";
     		echo "<script> ";
     		echo "ClassicEditor
			        .create( document.querySelector( '#editor' ), {
			        	 toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],

			        })

        			.catch( error => {
			            console.error( error );
			        } );";
     		echo "</script>";
     }

	echo "<div class='center'>";
	echo "<h4>Jekyll Post Maker</h4>";
	echo "</div>";
	
	echo "<form method='post' action=''>";
	echo "<div class='row'>";

	echo "<div class='col s12'>";
	echo "<div class='input-field'>";
	echo "<label>Judul Tulisan</label>";
	echo "<input type='text' name='title' />";
	echo "</div>";
	echo "</div>";

	echo "<div class='col s12'>";
	echo "<div class='input-field'>";
	echo "<label>Kategori Tulisan</label>";
	echo "<input type='text' name='category' />";
	echo "</div>";
	echo "</div>";


	ck_editor ( "content" );	


	echo "<div class='col s12'>";
	echo "<div class='input-field'>";
	echo "<input type='submit' class='btn btn-small' name='publish' value='Terbitkan' />";
	echo "</div>";
	echo "</div>";

	echo "</div>";
	echo "</form>";
?>

		<script src="/assets/js/materialize.min.js" charset="utf-8"></script>
		<script type="text/javascript">
			document.addEventListener('DOMContentLoaded', function() {
				M.AutoInit();
		     });
		</script>
	</body>
</html>
