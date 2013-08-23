
<body>

    <div class="out-container">
        <div class="header">
            <div class="top">
                <div class="in">
                    <ul class="right_menu">
                        <li class="menu uno"><a class="uno" href="https://Intranet.senaf.gob.ar" target="_blank"> Intranet </a></li>
                        <li class="menu dos"><a class="dos" href="https://correo.senaf.gob.ar/exchange" target="_blank"> Mail </a></li>
                        <li class="menu tres"><a class="tres" href="#" target="_blank"> Información </a></li>
                        <li class="menu cuatro"><a class="cuatro" href="#" target="_blank"> Ayuda (F1) </a></li>
                    </ul>
                    <div class="bottom_menu">
                        <div class="logo">
                            <a href="{{ path('_homepage') }}">
                                <img class="logo_image" src=" <?php echo ASSETS . 'frontend/images/icono-stock.png'; ?>" alt="stock" title="Stock" width="72" height="50" />
                            </a>
                            <!-- SUMINISTROS -->
                        </div>
                        <ul class="menu_principal">
                            <li> <a href="{{ path('article_new') }}">Alta de Productos </a></li>
                            <li> <a href="#">Stock Actual </a></li>
                            <li> <a href="#">Entrada de Stock </a></li>
                            <li> <a href="#">Salida de Stock </a></li>
                            <li> <a href="#">Remitos </a></li>
                            <li> <a href="#">Consultas </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="in">
                    <h1> Control de Stock </h1>
                    <div class="login">
                        <!-- <h3> Ingresar al </h3> -->
                        <a href="" > I N G R E S A R </a>
                    </div>
                </div>
            </div>
        </div>