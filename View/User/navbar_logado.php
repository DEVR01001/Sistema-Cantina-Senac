<body>
    <header class="header_user">
        <div class="conatiner_logo">
            <a href="../User/area__user_eventos.php"><img src="" alt=""></a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="../User/area_user_cardapio.php">Produtos</a>
                </li>
                <li>
                    <a href="../User/area_user_cardapio_bebidas.php">Bebidas</a>
                </li>
                <li>
                    <a href="../User/area_user_cardapio_lanches.php">Lanches</a>
                </li>
                <li>
                    <a href="../User/area_user_cardapio_doces.php">Doces</a>
                </li>
                <li>
                    <a href="../User/meus_pedidos.php">Pedidos</a>
                </li>
                <li>
                    <a href="../User/sacola.php">Sacola</a>
                </li>
                <li>
                    <a href="../User/area_user_editar_perfil.php">Perfil</a>
                </li>
            </ul>
        </nav>
        <div class="conatiner_btn_register">
            <a href="logout.php">Sair</a>
        </div>
    </header>
    <div class="header_menu_mobile">
        <div class="conatiner_logo_mobile">
            <a href="../User/area__user_eventos.php"><img src="../../Public/Img/InspiraTalks__2_-removebg-preview.png" alt=""></a>
        </div>
        <div class="conatiner_btn_mobile">
            <a href="../User/area_user_editar_perfil.php"><i class="fa-solid fa-circle-user"></i></a>
            <i id="btn_open_mobile_user" class="fa-solid fa-bars"></i>
        </div>
        <div id="content_user_mobile" class="content_menu_mobile">
            <ul>
                <li>
                    <a href="../User/area_user_cardapio.php">Produtos</a>
                </li>
                <li>
                    <a href="../User/sacola.php">Sacola</a>
                </li>
                <li>
                    <a href="../User/editar_user.php">Perfil</a>
                </li>
                <li>
                    <a href="../User/meus_pedidos.php">Pedidos</a>
                </li>
                <li>
                    <a href="logout.php">Sair</a>
                </li>
            </ul>
        </div>
   </div>
    

   <script>
    
    let BtnMobileUser = document.getElementById("btn_open_mobile_user");
    let ContentUserMobile = document.getElementById("content_user_mobile");
    
    
    BtnMobileUser.addEventListener('click', ()=>{
        ContentUserMobile.classList.toggle("active_mobile_user");
    })
       </script>
    
    