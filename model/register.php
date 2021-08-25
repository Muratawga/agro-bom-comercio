<?php
require_once 'config.php';

if (strlen($_POST['password']) <= 7){
    ?>
    <script>
    javascript:alert('Sua senha é muito curta! Coloque no mínimo 8 caracteres');
    javascript:window.location='../public/register.html';
    </script>
    <?php
}else{
    if ($_POST['password']==$_POST['passwordrepeat']){
        if ( !isset($_POST['nome'], $_POST['password']) ) {
            ?>
            <script>
            javascript:alert('Preencha os campos corretamente!');
            javascript:window.location='register.html';
            </script>
            <?php
        }
    
    if ($stmt = $conn->prepare('SELECT id password FROM users WHERE email = ?')) {
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();
        
        
        if ($stmt->num_rows == 0) {
            //nao existe esse record, pode gravar
            $stmt->close();
            $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO users (nome, password, email) values (?, ?, ?)");
            $stmt->bind_param('sss', $_POST['nome'], $hash, $_POST['email']);
            $stmt->execute();
            $stmt->close();
            ?>
            <script>
            javascript:alert('Conta criada com sucesso!');
            javascript:window.location='../controller/sign-in.html';
            </script>
            <?php
            
        } else {
            $stmt->close();
            ?>
            <script>
            javascript:alert('Ja existe esse usuario!');
            javascript:window.location='../controller/register.html';
            </script>
            <?php
        }
    }	
    }else{
        ?>
        <script>
        javascript:alert('As senhas não coincidem');
        avascript:window.location='../controller/register.html';
        
        </script>
        <?php
        echo $_POST['password'];
        echo $_POST['passwordrepeat'];
    }   
} 

   