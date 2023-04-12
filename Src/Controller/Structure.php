<?php

namespace Src\Controller;
use Src\Handller\UrlHandller;

session_start();

class Structure extends UrlHandller {
    public function setStructure($title = null, $classBody = null){
        $baseDir = $this->getUrl();
        if(isset($_SESSION['nome'])){
            if($_SESSION['tipo'] === 'aluno'){
                $urlLogged = $baseDir . 'access/portal/portalaluno';
            } else {
                $urlLogged = $baseDir . 'access/portal/portaladm';
            }
            $urlLogout = $baseDir . 'access/portal/logout';
            $userLogged = '<span class="user_logged"><a href="' . $urlLogged . '">' . $_SESSION['nome'] . '</a><a class="logout" href="' . $urlLogout . '">Sair</a></span>';
        } else {
            $userLogged = '';
        }
        $classBody       = ($classBody)? $classBody : 'home';
        $title           = ($title)? $title : 'LOL Idiomas Cursos de Inglês e Espanhol com Garantia';
        $urlPathImg      = $baseDir . 'Src/View/web/assets/images/';
        $urlPathCss      = $baseDir . 'Src/View/web/assets/css/';
        $urlPathJs       = $baseDir . 'Src/View/web/assets/js/';
        $urlPathCategory = $baseDir . 'access/';
        $category        = $this->getCategorys($baseDir);

        $this->Header = '<!DOCTYPE html>
                         <html>
                             <head>
                                  <link rel="icon" type="image/jpg" href="' . $urlPathImg . 'favicon.png' . '">
                                  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                  <title>' . $title . '</title>
                                  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
                                  <link rel="stylesheet" type="text/css" href="' . $urlPathCss . 'bootstrap.min.css' . '">
                                  <link rel="stylesheet" type="text/css" href="' . $urlPathCss . 'slick.min.css' . '">
                                  <link rel="stylesheet" type="text/css" href="' . $urlPathCss . 'slick-theme.min.css' . '">
                                  <link rel="stylesheet" type="text/css" href="' . $urlPathCss . 'styles.css' . '">
                                  <script type="text/javascript" src="' . $urlPathJs . 'jquery/jquery-1.12.0.min.js' . '"></script>
                                  <script type="text/javascript" src="' . $urlPathJs . 'bootstrap/bootstrap.min.js' . '"></script>
                                  <script type="text/javascript" src="' . $urlPathJs . 'slick/slick.min.js' . '"></script>
                                  <script type="text/javascript" src="' . $urlPathJs . 'default/default.js' . '"></script>
                             </head>
                             <body class="' . $classBody . '">
                                <main>
                                    <header>
                                        <div class="header">
                                            <div class="top-header">
                                                <div class="logo-home">
                                                    <a href="' . $baseDir . '">
                                                        <img class="img-fluid" src="' . $urlPathImg . 'logotipo-1.png' . '" alt="Logo LOL-Idiomas">
                                                    </a>
                                                </div>
                                                <div class="nav">
                                                    <nav class="menu-opcoes">
                                                        <ul>
                                                            ' . $category . '
                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="account">
                                                    <span class="matricula"><a href="' . $urlPathCategory . 'matricula' . '">Matricule-se</a></span>
                                                    <div class="top_account">
                                                        <img class="user" src="' . $urlPathImg . 'user.png' . '" onclick="openAccess()" />
                                                        ' . $userLogged . '
                                                        <div class="form_login display-none">
                                                              <h4>Área do Aluno:</h4>
                                                              <form class="login" name="login" method="post" action="' . $baseDir . 'Src/Controller/Login.php" onsubmit="getLogged(this, event)">
                                                                    <span>Email:</span>
                                                                    <input type="text" name="txtemail" onblur="removeError(this)">
                                                                    <span>Senha:</span>
                                                                    <input type="password" name="txtsenha" onblur="removeError(this)">
                                                                    <input type="submit" class="botao-login" name="Enviar" value="Entrar" onclick="getLogged(this, event)">
                                                                    <input type="reset" name="Apagar" class="botao-login" value="Apagar">
                                                              </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="main-container">';
                    $this->Footer = '</div>
                                    <footer class="footer">
                                        <ul>
                                            <li>&copy; 2017 - LOL Escola de Idiomas</li>
                                        </ul>
                                        <ul>
                                            <li class="footer-title">Institucional</li>
                                            <li><a href="">Sobre a LOL</a></li>
                                            <li><a href="">Trabalhe Conosco</a></li>
                                            <li><a href="">Indique um amigo</a></li>
                                        </ul>
                                        <ul>
                                            <li class="footer-title">Atendimento</li>
                                            <li><a href="">Fale Conosco</a></li>
                                            <li><a href="mailto:contato@lolidiomas.com.br">E-mail:contato@lolidiomas.com.br</a></li>
                                            <li>Telefone: (11) 4966-5496</li>
                                            <li><a target="_blank" href="https://api.whatsapp.com/send?phone=5511943885572&text=Olá, gostaria de mais informações.">Whatsapp: (11) 9 4388-5572</a></li>
                                            <li><a href="">Sugestões</a></li>
                                        </ul>
                                        <ul>
                                            <li class="footer-title">Cursos e Modalidades</li>
                                            <li><a href="">Inglês</a></li>
                                            <li><a href="">Espanhol</a></li>
                                            <li><a href="">Super Conversation Class</a></li>
                                        </ul>
                                        <ul>
                                            <li class="footer-title">Área do Aluno</li>
                                            <li><a href="">Acessar</a></li>
                                            <li><a href="">Atividades</a></li>
                                            <li><a href="">Ranking geral</a></li>
                                        </ul>
                                        <ul>
                                            <li class="footer-title">Siga-nos</li>
                                            <li><a target="_blank" href="https://www.facebook.com/lolidiomasoficial/"><img class="social-media" src="' . $urlPathImg . 'facebook.png' . '"/>Facebook</a></li>
                                            <li><a target="_blank" href="https://www.instagram.com/lolidiomasoficial/"><img class="social-media" src="' . $urlPathImg . 'instagram.png' . '"/>instagram</a></li>
                                            <li><a href=""><img class="social-media" src="' . $urlPathImg . 'youtube.png' . '"/>Youtube</a></li>
                                        </ul>
                                    </footer>
                                </main>
                             </body>
                         </html>';
    }
    public function getHeader(){
        echo $this->Header;
    }
    public function getFooter(){
        echo $this->Footer;
    }
}
