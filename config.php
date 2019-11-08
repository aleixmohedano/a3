<?php
	
	//proveedor de datos : MySQL
	$config=[
		'dsn'=>'mysql:localhost;dbname=projecte',
		'user'=>'a3',
		'pwd'=>'linuxlinux'
	];


	$dsn=$config['dsn'];
	$user=$config['user'];
	$pwd=$config['pwd'];

	//abrir conexion


	//autentificacion de usuario
	if (isset($_POST['submit'])) {
		if (!empty($_POST['user'])&&!empty($_POST['pwd'])) {
			$user=$_POST['user'];
			$pwd=$_POST['pwd'];
		}
	}


try{
		$dbh = new PDO('mysql:host=localhost;dbname=projecte', $config['user'], $config['pwd']);

	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	//hacer una consulta
	$stmt=$dbh->prepare("SELECT user,pwd FROM users WHERE user=:user AND pwd=:pwd");
	$stmt->bindParam(':user',$user);
	$stmt->bindParam(':pwd',$pwd);
	//ejecutar consulta
	$result=$stmt->execute();
	if ($stmt->rowCount()==1) {
		//hemos encontrado el usuario
		//establecer variables de sesion y redirigir
		$_SESSION['user']=$user;
		setcookie('user',$user,time()+365*24*60*60,'/','localhost',0); 
		header('Location:inicio.php');


}

	if(isset($_POST['submit2'])){
		if(!empty($_POST['user'])&&!empty($_POST['pwd'])){
			$user=$_POST['user'];
			$pwd=$_POST['pwd'];
		

		try{
			$dbh = new PDO('mysql:host=localhost;dbname=projecte', $config['user'], $config['pwd']);

		}catch(PDOException $e){ 
			echo $e->getMessage(); 
		}


		
		$stmt=$dbh->prepare("INSERT INTO users (user,pwd) VALUES (:user,:pwd)"); 
		$stmt->bindParam(':user',$_POST['user']); //el parametro user equivale a user
		$stmt->bindParam(':pwd',$_POST['pwd']);
		$result=$stmt->execute();
		$arr=$stmt->fetchAll();

		if($stmt->rowCount()==1){ $_SESSION['user']=$user;
		setcookie('user',$user,time()+365*24*60*60,'/','localhost',0); 
		header("Location: public/inicio.php");
	}
	

	}	


}


?>