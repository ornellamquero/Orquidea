<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

<?php 
            $numero=1;   
			$id_usuario="";
			$id_tipo="";
			$nombre_completo="";
			$cedula="";
			$id_grupo="";
		foreach ($reportes as $dato):
         if ($dato->id==$_GET['id'])
		 	{
			$id_usuario=$dato->id_usuario;
			$id_tipo=$dato->id_tipo;
			$firma1=$dato->firma1;
			$firma2=$dato->firma2;
			$fecha=$dato->fecha;
			$hora=$dato->hora;
			}
		 endforeach;
		 
		 foreach ($usuarios as $dato1):
         if ($dato1->id_usuario==$id_usuario)
		 	{
			$nombre_completo= $dato1->nombre." ".$dato1->apellido;
			$cedula=$dato1->cedula;
			}
		 endforeach;
		 
		 foreach ($grupo_usuarios as $dato):
         if ($dato->id_usuario==$id_usuario)
		 	{
			$id_grupo=$dato->id_grupo;
			$descripcion=$dato->descripcion;
			}
		 endforeach;
		 
		 foreach ($proyectos as $dato):
         if ($dato->id_grupo==$id_grupo)
		 	{
			$titulo=$dato->titulo;
			$estado=$dato->estado;
			$codigo=$dato->id;
			}
		 endforeach;
		 
		 ?>



<p><img src="vista/recursos/img/membrete.png" width="100%" height="80" /></p>
<div align="center">
  <table width="584" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
    <tr>
      <td width="133"><img src="vista/recursos/img/LOGO.png" width="133" height="131" /></td>
      <td width="435"><p>UNIVERSIDAD  POLIT&Eacute;CNICA TERRITORIAL<br />
        DEL ESTADO  LARA <strong>ANDR&Eacute;S ELOY BLANCO</strong> <br />
        Direcci&oacute;n  de Estudios Avanzados<br />
      Centro  de Estudios, Investigaci&oacute;n y Desarrollo Territorial (CEIDT)</p></td>
    </tr>
  </table>
  <p align="center"><strong>CONSTANCIA</strong></p>
</div>
<div>
  <div align="justify">
    <blockquote>
      <blockquote>
        <p>&nbsp;</p>
        <blockquote>
          <div>
            <p align="justify">El Centro de Estudios, Investigaci&oacute;n y  Desarrollo de la Universidad Polit&eacute;cnica Territorial de Lara &ldquo;Andr&eacute;s Eloy  Blanco&rdquo;, hace constar que <strong><?php echo strtoupper($nombre_completo); ?></strong>, c&eacute;dula de  identidad No. <strong><?php echo $cedula; ?></strong>, desarrolla actividades de investigaci&oacute;n en esta  Instituci&oacute;n, participando en el (los) siguiente (s) Proyecto (s) de  Investigaci&oacute;n:</p>
            <p align="center">&nbsp;</p>
            
            <div align="center">
              <table width="526" border="1">
                <tr>
                  <td width="169"><div align="center"><strong>Titulo</strong></div></td>
                  <td width="97"><div align="center"><strong>C&oacute;digo</strong></div></td>
                  <td width="135"><div align="center"><strong>Participaci&oacute;n</strong></div></td>
                  <td width="97"><div align="center"><strong>Estado</strong></div></td>
                </tr>
				
                <tr>
                  <td><div align="center"><?php echo $titulo; ?></div></td>
                  <td><div align="center"><?php echo "#".$codigo; ?></div></td>
                  <td><div align="center"><?php echo $descripcion; ?></div></td>
                  <td><div align="center"><?php echo $estado; ?></div></td>
                </tr>
                                                                                  </table>
            </div>
            <p align="justify">&nbsp;</p>
          </div>
          <p>Constancia que se emite en la ciudad  de Barquisimeto, a petici&oacute;n de parte interesada a los&nbsp;&nbsp; (
            <?php  echo date("d", strtotime($fecha));  ?>
            )  d&iacute;as 
            <?php  echo date("m", strtotime($fecha));  ?> 
            del  
            <?php  echo date("Y", strtotime($fecha));  ?>
            .</p>
        </blockquote>
        <p align="center">&nbsp;</p>
        <p align="center">Atentamente,</p>
        <p align="center">&nbsp;</p>
        <div align="center">
          <table width="533" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bgcolor="#FFFFFF">
            <tr>
              <td width="214"><div align="center"><strong>
                <?php  echo $firma1;  ?>
              </strong></div></td>
              <td width="83">&nbsp;</td>
              <td width="214"><div align="center"><strong>
                <?php  echo $firma2;  ?>
              </strong></div></td>
            </tr>
            <tr>
              <td>-----------------------------------</td>
              <td>&nbsp;</td>
              <td>-----------------------------------</td>
            </tr>
                  </table>
        </div>
        <p align="center">&nbsp;</p>
        <p align="center"><strong><em>Pertinencia  Social y Participaci&oacute;n Popular</em></strong></p>
      </blockquote>
    </blockquote>
  </div>
</div>
<p align="center">&nbsp;</p>
<p>&nbsp; </p>
</body>
</html>
