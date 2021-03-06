<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="import" href="editable.html">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all" />
        <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    	<script src="js/jquery-1.4.2.min.js"></script>
    	<script src="js/bootstrap.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="js/bootstrap-filestyle.js"></script>
        <script src="edit.js" type="text/javascript" charset="utf-8"></script>
    </head>
	<body onload="InitEditable()">
		<!-- FormatDoc permettant de la mise en forme du code HTML  -->
		<div style="margin:50px;">
			<div class="btn-group" role="group" aria-label="1">
				<!-- Mettre en gras -->
			  	<button type="button" class="btn btn-default" onclick="formatDoc('bold');"><span class="fa fa-fw fa-bold"></span></button>
			  	<!-- Mettre en italic -->
			 	<button type="button" class="btn btn-default" onclick="formatDoc('italic');"><span class="fa fa-fw fa-italic"></span></button>
			 	<!-- Souligner -->
				<button type="button" class="btn btn-default" onclick="formatDoc('underline');"><span class="fa fa-fw fa-underline"></span></button>
			</div>



			<div class="btn-group" role="group" aria-label="2">
				<!-- Aligner à gauche -->
			  	<button type="button" class="btn btn-default" onclick="formatDoc('justifyleft');"><span class="fa fa-fw fa-align-left"></span></button>
			  	<!-- Centrer -->
				<button type="button" class="btn btn-default" onclick="formatDoc('justifycenter');"><span class="fa fa-fw fa-align-center"></span></button>
				<!-- Aligner à droite -->
				<button type="button" class="btn btn-default" onclick="formatDoc('justifyright');"><span class="fa fa-fw fa-align-right"></span></button>
			</div>

			<div class="btn-group" role="group" aria-label="3">
				<!-- Insertion d'une ordonné -->
				<button type="button" class="btn btn-default" onclick="formatDoc('insertorderedlist');"><span class="fa fa-fw fa-list-ol"></span></button>
				<!-- Insertion d'une liste -->
				<button type="button" class="btn btn-default" onclick="formatDoc('insertunorderedlist');"><span class="fa fa-fw fa-list-ul"></span></button>
			</div>

			<!--<div class="btn-group" role="group" aria-label="4">
				<button type="button" class="btn btn-default" onclick="formatDoc('cut');"><span class="fa fa-fw fa-cut"></span></button>
				<button type="button" class="btn btn-default" onclick="formatDoc('copy');"><span class="fa fa-fw fa-copy"></span></button>
				<button type="button" class="btn btn-default" onclick="formatDoc('paste');"><span class="fa fa-fw fa-paste"></span></button>
			</div>-->

			<div class="btn-group" role="group" aria-label="5">
				<!-- CTRL + Z -->
				<button type="button" class="btn btn-default" onclick="formatDoc('undo');"><span class="fa fa-fw fa-undo"></span></button>
				<!-- CTRL + C -->
				<button type="button" class="btn btn-default" onclick="formatDoc('redo');"><span class="fa fa-fw fa-repeat"></span></button>
			</div>

			<div class="form-group form-group-sm">
				<div class="col-xs-2">
					<!-- Format du texte -->
					<select class="form-control" onchange="formatDoc('formatblock',this[this.selectedIndex].value);">
						<option selected>Format</option>
						<option value="h1">Titre 1 &lt;h1&gt;</option>
						<option value="h2">Titre 2 &lt;h2&gt;</option>
						<option value="h3">Titre 3 &lt;h3&gt;</option>
						<option value="h4">Titre 4 &lt;h4&gt;</option>
						<option value="h5">Titre 5 &lt;h5&gt;</option>
						<option value="h6">Sous-titre &lt;h6&gt;</option>
						<option value="p">Paragraphe &lt;p&gt;</option>
					</select>
					<!-- Police de caractère -->
					<select onchange="formatDoc('fontname',this[this.selectedIndex].value);">
						<option selected>Police de caractère</option>
						<option>Arial</option>
						<option>Arial Black</option>
						<option>Courier New</option>
						<option>Times New Roman</option>
					</select>
					<!-- Taille -->
					<select onchange="formatDoc('fontsize',this[this.selectedIndex].value);">
						<option class="heading" selected>Taille</option>
						<option value="1">Très petit</option>
						<option value="2">Petit</option>
						<option value="3">Normal</option>
						<option value="4">Moyen</option>
						<option value="5">Gros</option>
						<option value="6">Très gros</option>
						<option value="7">Maximum</option>
					</select>
					<!-- Couleur du texte -->
					<select onchange="formatDoc('forecolor',this[this.selectedIndex].value);">
						<option class="heading" selected>Couleur du texte</option>
						<option value="red">Rouge</option>
						<option value="blue">Bleu</option>
						<option value="green">Vert</option>
						<option value="black">Noir</option>
					</select>
					<!-- Couleur de fond du texte -->
					<select onchange="formatDoc('backcolor',this[this.selectedIndex].value);">
						<option class="heading" selected>Couleur de l'arrière plan</option>
						<option value="red">rouge</option>
						<option value="green">Vert</option>
						<option value="black">Noir</option>
						<option value="white">Blanc</option>
					</select>
				</div>
			</div>
			
			<!-- Iframe permet la saisie et l'interprétation du HTML  -->
			<iframe id="editor" src="template.php" style="width: 80%;height: 200%;"> </iframe>
		
		<!-- Upload d'image -->
		<form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
	    		<div  class="col-xs-4">
	    			<input type="file" name="fileToUpload" id="fileToUpload" class="filestyle">
					<button type="submit" class="btn btn-success" style="margin-left:20px;"><i class="fa fa-fw fa-upload"></i> Uploader</button>
					<div class="btn-group" role="group" aria-label="5">
						<button title="Mettre image" type="button" class="btn btn-default" onclick="formatDoc('insertImage','upload/<?php if(isset($_FILES["fileToUpload"])){echo basename( $_FILES["fileToUpload"]["name"]);} ?>');">
							<i class="fa fa-fw fa-send"></i> Mettre l'image
						</button>
					</div>
				</div>
		</form>
	<?php
	if(isset($_FILES["fileToUpload"])){
		$target_dir = "upload/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Vérifie que c'est une image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "Se fichier est une image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "Se fichier n'est pas une image";
		        $uploadOk = 0;
		    }
		}
		// Vérifie que le fichier n'existe pas
		if (file_exists($target_file)) {
		    echo "Le fichier existe déjà.";
		    $uploadOk = 0;
		}
		// Vérifie la taille de l'image
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo "Votre image est trop grande.";
		    $uploadOk = 0;
		}
		// Extentions d'images accepté
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Le format de l'image doit être : JPG, JPEG, PNG ou GIF";
		    $uploadOk = 0;
		}
		// Vérifie si les conditions pour l'upload sont remplies
		if ($uploadOk == 0) {
		    echo "Votre image n'a pas était envoyé";
		// Nous allons essyé d'upload
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "Votre image ". basename( $_FILES["fileToUpload"]["name"]). " a bien été envoyé.";
		    } else {
		        echo "Votre n'a pas été envoyé";
		    }
		}?>
<?php	}
?>
		<label for="nomPage">Nom de la page : </label>
		<input name="nomPage" id="nom" type="text" placeholder="coucou" required />
		<div class="btn-group" role="group" aria-label="5">
			<button style="margin-left:200px;" type="button" class="btn btn-success" onclick="creerPage();"><span class="fa fa-fw fa-send"></span> Envoyer</button>
		</div>
		</form>
	</body>
</html>