<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/324b71f187.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/stylesLogin.css">
    <script src="./js/login.js" defer></script>
    <title>Arranchamento DCMun</title>
</head>
<body>
    <main>
        <div class="login-container" id="login-container">
            <div class="form-container">
                <form class="form form-login" action="ope.php" id="formlogin" name="formlogin" method="post">
                    <img src="img/logo_dcmun.png" alt="" width="100px">
                    <h2 class="form-title">Entrar</h2>
                    <div class="form-input-container">
                        <input type="number" class="form-input" placeholder="Insira seu CPF" name="login" id="login">
                        <input type="password" class="form-input" placeholder="Insira sua Senha" name="senha" id="senha">
                    </div>
                    <input type="submit" class="form-button" name='logar' value="Logar">
                    <p class="mobile-text">
                        Não possui conta?
                        <a href="#" id="open-register-mobile">Cadastre-se</a>
                    </p>
                </form>
                <form class="form form-register" method="post" action="usuario_novo.php" id="usuario_novo" name="usuario_novo">
                    <h2 class="form-title">Criar Conta</h2>
                    <div class="form-input-container">
                        <input type="text" class="form-input" placeholder="Nome Completo" id="nomecompleto" name="nomecompleto">
                        <input type="text" class="form-input" placeholder="Nome de Guerra" id="nomeguerra" name="nomeguerra">
                        <select class="form-input" id="companhia" name="companhia">
                            <option value="#" selected>Companhia</option>
                            <option value="CCAP">CCAP</option>
                            <option value="CDM">CDM</option>
                            <option value="CSM">CSM</option>
                        </select>
                        <select class="form-input" id="graduacao" name="graduacao">
                            <option value="#" selected>Graduação</option>
                            <option value="TC">TC</option>
                            <option value="MAJ">MAJ</option>
                            <option value="CAP">CAP</option>
                            <option value="1º TEN">1º TEN</option>
                            <option value="2º TEN">2º TEN</option>
                            <option value="ASP OF">ASP OF</option>
                            <option value="ST">ST</option>
                            <option value="1º SGT">1º SGT</option>
                            <option value="2º SGT">2º SGT</option>
                            <option value="3º SGT">3º SGT</option>
                            <option value="aluno">ALUNO</option>
                            <option value="CB">CB</option>
                            <option value="SD EP" selected>SD</option>
                            <option value="SD EV">SD EV</option>
                          </select>
                        <input type="number" class="form-input" placeholder="CPF" id="cpf" name="cpf" >
                        <input type="password" class="form-input" placeholder="Senha" id="inputPassword" name="inputPassword">
                    </div>                    
                    <input type="submit" class="form-button" name='cadastrar' value="Cadastrar">
                    <p class="mobile-text">
                        Já tem conta?
                        <a href="#" id="open-login-mobile">Login</a>
                    </p>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <img src="img/logo_dcmun.png" alt="" width="100px">
                    <h2 class="form-title form-title-light">Já tem conta?</h2>
                    <p class="form-text">Para fazer seu arranchamento, caso já possua conta. Clique no botão abaixo</p>
                    <button class="form-button form-button-light" id="open-login">Entrar</button>
                </div>
                <div class="overlay">
                    <h2 class="form-title form-title-light">ARRANCHAMENTO</h2>
                    <p class="form-text">Caso ainda não tenha tido se cadastrado, clica no botão abaixo</p>
                    <button class="form-button form-button-light" id="open-register">Cadastrar</button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>