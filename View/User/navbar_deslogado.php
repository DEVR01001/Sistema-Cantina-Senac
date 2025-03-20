<body>
    <header class="header_user">
        <div class="conatiner_logo">
            <a href="../User/Index..php"><img src="" alt=""></a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="#home"></a>
                </li>
                <li>
                    <a href="#sobre"></a>
                </li>
                <li>
                    <a href="#evento"></a>
                </li>
                <li>
                    <a href="#contato"></a>
                </li>
            </ul>
        </nav>
        <div class="conatiner_btn_register">
            <a href="../User/cadastrar_user.php">Inscreva-se</a>
        </div>
    </header>
   <div class="header_menu_mobile">
        <div class="conatiner_logo_mobile">
            <a href="../User/Index..php"><img src="../../Public/Img/InspiraTalks__2_-removebg-preview.png" alt=""></a>
        </div>
        <div class="conatiner_btn_mobile">
            <a href="../User/cadastro_user.php"><i class="fa-solid fa-circle-user"></i></a>
            <i id="btn_open_mobile_user" class="fa-solid fa-bars"></i>
        </div>
   </div>

   <script>
    
let BtnMobileUser = document.getElementById("btn_open_mobile_user");
let ContentUserMobile = document.getElementById("content_user_mobile");


BtnMobileUser.addEventListener('click', ()=>{
    ContentUserMobile.classList.toggle("active_mobile_user");
})
   </script>

