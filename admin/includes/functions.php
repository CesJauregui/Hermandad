<?php
//Incluir el archivo de la conexión con la base de datos
    include "db.php";

    //Función para agregar una categoría
    function add_category(){
        global $conexion;
        if (isset($_POST['cat_add'])) {
            if (empty($_POST['cat_title'])) {
                header("location: ../categories.php");
            }else{
                $cat_title = $_POST['cat_title'];
                $query = "INSERT INTO categorias(tit_categoria) VALUES ('$cat_title')";
                $result = mysqli_query($conexion,$query);
                if (!$result) {
                    die("No se pudo guardar la categoría" . mysqli_error($conexion));
                }else{
                    header("location: ../categories.php");
                }
            }
        }
    }
    add_category();
   function show_category(){
        global $conexion;
        $query="SELECT * FROM categorias";
        $result=mysqli_query($conexion,$query);
        while ($row = mysqli_fetch_assoc($result)) {
            $cat_id = $row['idcategoria'];
            $cat_title = $row['tit_categoria'];
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete_cat={$cat_id}'><input type='submit' class='btn btn-danger' value='Borrar'></a></td>";
            echo "</tr>";
        }
    }
    //Función para editar una categoría
    function edit_category(){
        global $conexion;
        if (isset($_POST['editar_cat'])) {
            $id_categ_e = $_POST['editar_cat_e'];
            $category_title_e = $_POST['category_title'];
                $sql = mysqli_query($conexion, "UPDATE categorias SET tit_categoria='$category_title_e' WHERE idcategoria='$id_categ_e'");
                if ($sql) {
                    header("location: ../categories.php");
                }else{
                    die("No se pudo enviar la información: " . mysql_error($conexión));
                }
        }
    }
    edit_category();

    //Función para borrar una categoría
    function delete_category(){
        global $conexion;
        if (isset($_GET['delete_cat'])) {
            $cat_id = $_GET['delete_cat'];
            $query = "DELETE FROM categorias WHERE idcategoria = '$cat_id'";
            $result = mysqli_query($conexion,$query);
            if (!$result) {
                die("No se pudo borrar la categoría" . mysqli_error($conexion));
            }else{
                header("location: categories.php");
            }
        }
    }
    delete_category();

    //Función para agregar un nuevo post
    function add_post(){
        global $conexion;
        if (isset($_POST['publicar'])) {
            $post_title=$_POST['title'];
            $category=$_POST['categorys'];
            //obtener categoria_id
            $sql = mysqli_query($conexion, "SELECT idcategoria FROM categorias WHERE tit_categoria = '$category'");
            $row = mysqli_fetch_array($sql);
            $category_id = $row['idcategoria'];
            $status=$_POST['status'];
            $type_p=$_POST['type_p'];
            $content=$_POST['editor1'];
            $date = date("d m Y h:i:s A", $timestamp = time());

            if (isset($_FILES['image'])) {
                $dir = "../images/";
                $target_file = $dir.basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'],$target_file)) {
                    echo "image a sido cargado";
                }else{
                    echo "Hubo algun error al cargar la imagen";
                }
            }

            $query = "INSERT INTO posts(post_title,post_category,post_category_id,type_post,post_content,post_date,post_image,post_status) VALUES('$post_title','$category','$category_id','$type_p','$content','$date','$target_file','$status')";
            $result=mysqli_query($conexion,$query);
            if (!$result) {
                die("No se pudo enviar la información " . mysqli_error($conexion));
                header("location: ../posts.php?source=add_new");
            }else{
                header("location: ../index.php");
            }
        }
    }
    add_post();

    //Función para editar posts
    function edit_posts(){
		if (isset($_POST['modify'])) {
			global $conexion;
			$id_e = $_POST['editID'];
			$title = $_POST['title'];
			$category = $_POST['category'];
            $type_e = $_POST['type_p_e'];
			$status = $_POST['status'];
			$img = $_POST['image'];
			$post_image = $_FILES['post_images']['name'];
            $conten = $_POST['content'];
            $datee = date("d m Y h:i:s A", $timestamp = time());
			$image = "";
			//obtener post-id
			$sql = mysqli_query($conexion, "SELECT idcategoria  FROM categorias WHERE tit_categoria = '$category'");
			$result = mysqli_fetch_array($sql);
			$post_cat_id = $result['idcategoria'];
			//Revisar si se ha subido una nueva imagen
			if (isset($_FILES['post_images']) && $post_image != "") {
				$fileName = $_FILES['post_images']['name'];
				$fileSize = $_FILES['post_images']['size'];
				$fileTmp = $_FILES['post_images']['tmp_name'];
				$allowed = ['png','jpg','jpeg','gif'];
				$fileExt = explode('.', $fileName);
				$fileActExt = strtolower(end($fileExt));
				$dire = "../images/";
				//Revisar si la imagen tiene la extension correcta
				if (!in_array($fileActExt,$allowed)) {
					echo "<script>alert('No es el tipo de imagen')</script>";
				}elseif ($fileSize > 10000000) {
					echo "<script>alert('el archivo es muy pesado')</script>";
				}else{
					$newImage = uniqid("name",true) . "." . $fileActExt;
					$target = $dire.basename($newImage);
					if (move_uploaded_file($fileTmp,$target)) {
						$image = $target;
					}
				}
			}else{
				 $image = $img;
			}
			$query = mysqli_query($conexion, "UPDATE posts SET post_title='$title', post_category='$category', post_category_id='$post_cat_id', type_post='$type_e', post_status='$status', post_image='$image', post_content='$conten', post_date='$datee' WHERE post_id='$id_e'");
			if ($query) {
				header("location: ../posts.php");
			}
        }
    }
    edit_posts();

    //Función para insertar un nuevo integrante
    function add_integ(){
        if(isset($_POST['agregar_i'])){
        global $conexion;
        $nombre = $_POST['nombre_i'];
        $apellido = $_POST['apellido_i'];
        $tiempo = $_POST['tiempo'];
        $correo = $_POST['correo'];
        $foto = $_POST['foto'];
        $estado = $_POST['estado'];
        if (isset($_FILES['foto'])) {
            $dir = "../images-integr/";
            $target_file = $dir.basename($_FILES['foto']['name']);
            if (move_uploaded_file($_FILES['foto']['tmp_name'],$target_file)) {
                echo "image a sido cargado";
            }else{
                echo "Hubo algun error al cargar la imagen";
            }
        }
        $sql = mysqli_query($conexion, "INSERT INTO integrantes(nombres,apellidos,tiempo,correo,foto,estado) VALUES ('$nombre','$apellido','$tiempo','$correo','$target_file','$estado')");
            if (!$sql) {
                die("No se pudo enviar la información " . mysqli_error($conexion));
                header("location: ../integrantes.php");
            }else{
                header("location: ../integrantes.php");
            }
        }
    }
    add_integ();

    function edit_integrante(){
        if(isset($_POST['editInt'])){
        global $conexion;
        $id_e = $_POST['edit_id_m'];
        $imag = $_POST['imag'];
        $nombre = $_POST['nombre_e'];
        $apellido = $_POST['apellido_e'];
        $tiempo = $_POST['tiempo_e'];
        $correo = $_POST['correo_e'];
        $estado = $_POST['estad'];
        $post_image = $_FILES['foto_e']['name'];
        $img2 = "";
        if (isset($_FILES['foto_e']) && $post_image != "") {
				$fileName = $_FILES['foto_e']['name'];
				$fileSize = $_FILES['foto_e']['size'];
				$fileTmp = $_FILES['foto_e']['tmp_name'];
				$allowed = ['png','jpg','jpeg','gif'];
				$fileExt = explode('.', $fileName);
				$fileActExt = strtolower(end($fileExt));
				$dire = "../images-integr/";
				//Revisar si la imagen tiene la extension correcta
				if (!in_array($fileActExt,$allowed)) {
					echo "<script>alert('No es el tipo de imagen')</script>";
				}elseif ($fileSize > 10000000) {
					echo "<script>alert('el archivo es muy pesado')</script>";
				}else{
					$newImage = uniqid("name",true) . "." . $fileActExt;
					$target = $dire.basename($newImage);
					if (move_uploaded_file($fileTmp,$target)) {
						$img2 = $target;
					}
				}
			}else{
				 $img2 = $imag;
			}
            $query = mysqli_query($conexion, "UPDATE integrantes SET nombres='$nombre', apellidos='$apellido', tiempo='$tiempo', correo='$correo', foto='$img2', estado='$estado' WHERE idintegrante='$id_e'");
			if (!$query) {
				die("No se pudo enviar la información " . mysqli_error($conexion));
			}else{
                header("location: ../integrantes.php");
            }
        }
    }
    edit_integrante();
    
    //Función para mostrar el usuario
    function show_user(){
        global $conexion;
        $query="SELECT * FROM usuario";
        $result= mysqli_query($conexion,$query);
        while($row=mysqli_fetch_assoc($result)){
            $iduser=$row['idusuario'];
            $usua=$row['user'];
            $passw=$row['pass'];
            $prof_pic=$row['profile_pic'];
            $active=$row['is_active'];
            $rol=$row['role'];
            echo "<tr>";
            echo "<td>{$iduser}</td>";
            echo "<td>{$usua}</td>";
            //echo "<td>{$passw}</td>";
            echo "<td>{$prof_pic}</td>";
            echo "<td>{$active}</td>";
            echo "<td>{$rol}</td>";
            echo "<td><a href='users.php?delete_user=$iduser'><input type='submit' class='btn btn-danger' value='Eliminar'></a></td>";
            echo "</tr>";
        }
    }
    
    //Funciones gestiones adicionales
    function add_historia(){
        if(isset($_POST['add_historia'])){
            global $conexion;
            $historia = $_POST['contenido'];
            $sql = mysqli_query($conexion, "UPDATE historia SET descripcion='$historia'");
            if($sql){
                header("location: ../adicionales.php");
            }else{
                die("No se pudo enviar la información " . mysqli_error($conexion));
            }
        }
    }
    add_historia();

    function add_banner(){
        if(isset($_POST['add_banner'])){
            global $conexion;
            $img_b = $_POST['img_b'];
            if (isset($_FILES['img_b'])) {
                $dir = "../img-banner/";
                $target_file = $dir.basename($_FILES['img_b']['name']);
                if (move_uploaded_file($_FILES['img_b']['tmp_name'],$target_file)) {
                    echo "image a sido cargado";
                }else{
                    echo "Hubo algun error al cargar la imagen";
                }
            }
            
            $query = mysqli_query($conexion,"INSERT INTO banner(imagen) VALUES ('$target_file')");
            if($query){
                header("location: ../adicionales.php");
            }else{
                die("No se pudo enviar la información " . mysqli_error($conexion));
            }
        }
    }
    add_banner();

    function delet_img_banner(){
        if (isset($_POST['delet_img_banner'])) {
            global $conexion;
            $id_img_ban = $_POST['id_img_banner'];
            $sql = mysqli_query($conexion,"DELETE FROM banner WHERE idbanner = '$id_img_ban'");
            if ($sql) {
                header("location: ../index.php");
            }else{
                die("No se pudo borrar el título: " . mysqli_error($conexion));
            }
        }
    }
    delet_img_banner();

    /*--------------------------PROGRAMAS Y FESTIVIDADES-----------------------------------
    Función para agregar un programa con la elección del titulo*/
    function add_program(){
        if (isset($_POST['add_programa'])) {
            global $conexion;
            $titulo_select = $_POST['titulo_pro'];
            $query = mysqli_query($conexion,"SELECT * FROM titulo_programas where titulo = '$titulo_select'");
            $row2 = mysqli_fetch_assoc($query);
            $id_titulo_programa = $row2['idtitulo_progr'];
            $subtitulo = $_POST['subtitulo'];
            $contenido = $_POST['edito'];
            if ($titulo_select == 'Seleccione...' && empty($contenido)) {
                header("location: ../programas.php");
            }else{
                 $sql = mysqli_query($conexion,"INSERT INTO programas(titulo,id_title_programa,subtitulo,contenido) VALUES('$titulo_select','$id_titulo_programa','$subtitulo','$contenido')");
                if ($sql) {
                    header("location: ../programas.php");
                }else{
                die("No se pudo enviar la información " . mysql_error($conexion));
                }
            }
        }
    } 
    add_program();

    //Función para editar un programa
    function edit_program(){
        if (isset($_POST['prog_agregar_i'])) {
            global $conexion;
            $idprograma = $_POST['id_prog_e'];
            $program_title_i = $_POST['program_titulo_i'];
            $program_actividad_i = $_POST['program_actividad_i'];
            $content_prog = $_POST['content_prog'];
            if (!empty($content_prog)) {
                $sql = mysqli_query($conexion,"UPDATE programas SET titulo='$program_title_i', subtitulo='$program_actividad_i', contenido='$content_prog' WHERE
                    idprograma = '$idprograma'");
                if ($sql) {
                    header("location: ../lista_programas.php");
                }else{
                    die("No se pudo enviar la información: " . mysqli_error($conexion));
                }
            }
        }
    }
    edit_program();
    //--------------------------FIN PROGRAMAS Y FESTIVIDADES----------------------------

    /*----------------------------------TITULO DE PROGRAMAS---------------------------------*/
    //Función para agregar un título de programa
    function add_title(){
        if (isset($_POST['add_titu'])) {
            global $conexion;
            $titulo = $_POST['titu'];
            if (!empty($titulo)) {
                $sql = mysqli_query($conexion,"INSERT INTO titulo_programas(titulo) VALUES('$titulo')");
                if ($sql) {
                    header("location: ../programas.php");
                }else{
                    die("No se pudo enviar la información" . mysql_error($conexion));
                }
            }
        }
    }
    add_title();

    //Función para borrar un titulo de programa
    function delete_title_program(){
        if (isset($_GET['borrar_progr'])) {
            global $conexion;
            $id_program_delet = $_GET['borrar_progr'];
            $sql = mysqli_query($conexion,"DELETE FROM titulo_programas WHERE idtitulo_progr = '$id_program_delet'");
            if ($sql) {
                header("location: programas.php");
            }else{
                die("No se pudo borrar el título: " . mysqli_error($conexion));
            }
        }
    }
    delete_title_program();
    /*--------------------------FIN TITULOS DE PROGRAMAS-----------------------------------*/

    /*--------------------------TITULO DE NAVBAR----------------------------------------*/
    //Función para actualizar la barra de navegación "Ejm: Semana Santa 2021"
    function add_title_navbar(){
        if (isset($_POST['add_titu_nav'])) {
            global $conexion;
            $titu_nav = $_POST['titu_nav'];
                $sql = mysqli_query($conexion,"INSERT INTO titulo_navbar(titulo) VALUES('$titu_nav')");
                if ($sql) {
                    header("location: ../programas.php");
                }else{
                    die("No se pudo enviar la información: " . mysql_error($conexion));
                }
        }
    }
    add_title_navbar();

    //Función para borrar un titulo de navbar
    function delete_title_navbar(){
        if (isset($_GET['borrar_nav'])) {
            global $conexion;
            $id_navbar_delet = $_GET['borrar_nav'];
            $sql = mysqli_query($conexion,"DELETE FROM titulo_navbar WHERE id_navbar = '$id_navbar_delet'");
            if ($sql) {
                header("location: programas.php");
            }else{
                die("No se pudo borrar el título: " . mysqli_error($conexion));
            }
        }
    }
    delete_title_navbar();
    /*-----------------------------FIN TITULO NAVBAR-----------------------------------*/

    /*-----------------------------GALERÍA DE FOTOS-ADMIN------------------------------*/
    //Función para subir una foto
    function add_img_gal(){
        if (isset($_POST['subir_imagen'])) {
            global $conexion;
            $titulo_pro_img = $_POST['titulo_pro_img'];
            $img_gal= $_POST['img_gal'];
            $query = mysqli_query($conexion, "SELECT * FROM titulo_navbar WHERE titulo = '$titulo_pro_img'");
            $row = mysqli_fetch_array($query);
            $program_id = $row['id_navbar'];
            $img = "";
            if (isset($_FILES['img_gal'])) {
                $fileName = $_FILES['img_gal']['name'];
                $fileSize = $_FILES['img_gal']['size'];
                $fileTmp = $_FILES['img_gal']['tmp_name'];
                $allowed = ['png','jpg','jpeg','gif'];
                $fileExt = explode('.', $fileName);
                $fileActExt = strtolower(end($fileExt));
                $dire = "../images-program/";
                //Revisar si la imagen tiene la extension correcta
                if (!in_array($fileActExt,$allowed)) {
                    echo "<script>alert('No es el tipo de imagen')</script>";
                }elseif ($fileSize > 10000000) {
                    echo "<script>alert('el archivo es muy pesado')</script>";
                }else{
                    $newImage = uniqid("name",true) . "." . $fileActExt;
                    $target = $dire.basename($newImage);
                    if (move_uploaded_file($fileTmp,$target)) {
                        $img = $target;
                    }
                }
            }else{
                 $img = $img_gal;
            }
            $sql = mysqli_query($conexion,"INSERT INTO galeria(programa,idprogram,imagen) VALUES('$titulo_pro_img','$program_id','$img')");
            if ($sql) {
                header("location: ../galery.php");
            }else{
                die("No se pudo enviar la información: " . mysqli_error($conexion));
            }
        }
    }
    add_img_gal();

    //Función eliminar imagen de la galeria
    function delet_img_gal(){
        if (isset($_POST['delet_img'])) {
            global $conexion;
            $id_img_gal = $_POST['id_img_gal'];
            $sql = mysqli_query($conexion,"DELETE FROM galeria WHERE idimagen = '$id_img_gal'");
            if ($sql) {
                header("location: ../galery.php");
            }else{
                die("No se pudo borrar el título: " . mysqli_error($conexion));
            }
        }
    }
    delet_img_gal();

    //Función borrar 
    function delete($table, $colName, $id){
        global $conexion;
        $query = mysqli_query($conexion, "DELETE FROM $table WHERE $colName = $id");
        if ($query) {
            return true;
        }else{
            return false;
        }
    }

    //Función redireccionar a una págína
    function redirect($page = 'index.php'){
        header("location: ".$page." ");
    }
    
    //Función Actualizar estado del post
    function updateStatus($id){
        global $conexion;
        $sql = mysqli_query($conexion, "SELECT post_status FROM posts WHERE post_id = '$id'");
        if (mysqli_num_rows($sql) > 0) {
            $result = mysqli_fetch_array($sql);
            $status = $result['post_status'];
            if ($status == "borrador") {
                $query = mysqli_query($conexion, "UPDATE posts SET post_status = 'publicado' WHERE post_id = $id");
            }else{
                $query = mysqli_query($conexion, "UPDATE posts SET post_status = 'borrador' WHERE post_id = $id");
            }
            return true;
        }else{
            return false;
        }
    }

    //Funciones para obtener el número de:
    //Posts
    function getNumPost(){
        global $conexion;
        $query = mysqli_query($conexion, "SELECT * FROM posts");
        if (mysqli_num_rows($query)>0) {
            return mysqli_num_rows($query);
        }
        return 0;
    }
    //Usuarios
    function getNumUser(){
        global $conexion;
        $query = mysqli_query($conexion, "SELECT * FROM usuario");
        if (mysqli_num_rows($query)>0) {
            return mysqli_num_rows($query);
        }
        return 0;
    }
    //Programas
    function getNumProg(){
        global $conexion;
        $query = mysqli_query($conexion, "SELECT * FROM titulo_programas");
        if (mysqli_num_rows($query)>0) {
            return mysqli_num_rows($query);
        }
        return 0;
    }
    //Galería
    function getNumGal(){
        global $conexion;
        $query = mysqli_query($conexion, "SELECT * FROM galeria");
        if (mysqli_num_rows($query)>0) {
            return mysqli_num_rows($query);
        }
        return 0;
    }
    //Integrantes
    function getNumInteg(){
        global $conexion;
        $query = mysqli_query($conexion, "SELECT * FROM integrantes");
        if (mysqli_num_rows($query)>0) {
            return mysqli_num_rows($query);
        }
        return 0;
    }
    //Categorías
    function getNumCat(){
        global $conexion;
        $query = mysqli_query($conexion, "SELECT * FROM categorias");
        if (mysqli_num_rows($query)>0) {
            return mysqli_num_rows($query);
        }
        return 0;
    }
?>
