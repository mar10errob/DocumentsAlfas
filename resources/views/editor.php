<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editor</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/editor.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/app.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/carlos.css">
</head>
<body>
	<div class="header">
		<div>
			<div class="position">
                <a href="<?php echo "mundo"?>">
                    <img src="../../public/images/pacman.png"> Editor
                </a>
            </div>

			<div class="icon-save">
                <img src="../../public/images/save.png">
            </div>

			<div class="back2"><a href="documents.php"><img src="../../public/images/back.png"></a></div>
		</div>
	</div>

	<div class="ce">
		<div id="editor">
			<div class="c_editor">
				<div  id="titulo">
					<textarea id="title" onblur="" placeholder="Escribe tu titulo del documento aqui"></textarea>
				</div>
				<div  id="introduccion">
					<textarea placeholder="haz click para agregar texto" id="areadetexto" class=""></textarea>
				</div>
			</div>	
		</div>
		<button onclick="herramientas()" class="b_herramientas"><img src="../../public/images/tools.png"></button>
	</div>
	
	<div id="bh">
		<div id="icono_h">
			<ul>
				<li> <div id="b_acomodar"><img src="../../public/images/negrita.png" onclick="bold();"></div> </li>
				<li><div class="palette"><div id="p_acomodar"><img src="../../public/images/palette.png"></div>
					<div class="acomodar">
						<div class="colores">
								<div onclick="color('#000000');" class="colors" id="negro"></div>
								<div onclick="color('#FF8A80');" class="colors" id="rojo"></div>
								<div onclick="color('#FFFF8D');" class="colors" id="amarillo"></div>
								<div onclick="color('#FFD180');" class="colors" id="naranja"></div>
								<div onclick="color('#80D8FF');" class="colors" id="azul"></div>
								<div onclick="color('#CCFF90');" class="colors" id="verde"></div>
								<div onclick="color('#A7FFEB');" class="colors" id="turquesa"></div>
								<div onclick="color('#CFD8DC');" class="colors" id="gris"></div>
							</div>
					</div>	
				</div> </li>
				<li> <div class="font_size"><div id="f_acomodar"><img src="../../public/images/size.png"></div>

						<div class="size">
								<select onchange="fontSize();" id="fontSize">
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="14">14</option>
									<option value="16">16</option>
									<option value="18">18</option>
									<option value="20">20</option>
									<option value="22">22</option>
									<option value="24">24</option>
									<option value="26">26</option>
									<option value="28">28</option>
									<option value="30">30</option>
									<option value="32">32</option>
								</select>
						</div>
						
				</div> </li>
				<li> <div id="u_acomodar"><img src="../../public/images/underline.png" onclick="underlined();"></div> </li>
				<li> <div id="san"><img src="../../public/images/marginl.png" onclick="bleeding();">

					<div class="sangria">
								<select onchange="bleeding();" id="bleeding">
									<option value="0">Sin Sangría</option>
									<option value="10">Sangría 1</option>
									<option value="15">Sangría 2</option>
									<option value="20">Sangría 3</option>
									<option value="25">Sangría 4</option>
								</select>
					</div>


				</div> </li>
				<li> <div id="c_acomodar"><img src="../../public/images/cursiva.png" onclick="italic();"></div> </li>
				
				
			</ul>
		</div>

	</div>
</body>
</html>