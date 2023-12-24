<header> <strong>Visit<span>.com</span></strong></header>
    <nav> 
        <a href="<?=URL?>" id="an"><i class="fa fa-home"></i> <span>Home</span></a>
       <?php
         if (isset($_SESSION['id'])) {
            ?>
            <li><a href="<?=URL?>/Usuarios/logout">Logout</a></li>
            <li id="reg"><a href="<?=URL?>/Post/">Posts</a></li>
            <?php
         }
         else {
            ?>
             <li id="reg"><a href="<?=URL?>/Usuarios/cadastrar">Register</a></li>
            <li><a href="<?=URL?>/Usuarios/login">Login</a></li>
            <?php
         }
       ?>
    </nav>