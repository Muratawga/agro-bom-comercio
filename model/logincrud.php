<?php
session_start();
require_once 'config.php';

if ($stmt = $conn->prepare('SELECT id, password FROM users WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();
		// Account exists, now we verify the password.
		// Note: remember to use password_hash in your registration file to store the hashed passwords.
		if (password_verify($_POST['password'], $password)) {
			// Verification success! User has logged-in!
			// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            if ($stmt = $conn->prepare('SELECT code FROM code WHERE code = ?')) {
                $stmt->bind_param('s', $_POST['codigo']);
                $stmt->execute();
                $stmt->store_result();
    
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($id, $password);
                    $stmt->fetch();

                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $_POST['email'];
                    $_SESSION['id'] = $id;
                    header('Location: ../controller/crud.php');

			
		} else {
			// Incorrect password
			?>
			<script>
			javascript:alert('Senha/Código errado!');
			javascript:window.location='../controller/logincrud.php';
			</script>
			<?php
		}
	} else {
		// Incorrect email
		?>
		<script>
		javascript:alert('Email errado!');
		javascript:window.location='../controller/logincrud.php';
		</script>
		<?php
	}
	$stmt->close();
        }
    }
}	
