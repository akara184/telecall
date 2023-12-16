<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modelo Conceitual - Telecall</title>
    <link rel="stylesheet" href="/telecall/assets/framework/bulma/bulma/css/bulma.css" />
    <link rel="icon" type="image/jpg" href="/telecall/assets/img/Untitled.png">
    <link rel="stylesheet" href="/telecall/assets/css/home.css" />
    <link rel="stylesheet" href="/telecall/assets/vendors/fontawesome/css/all.css" />
    <link rel="stylesheet" href="/telecall/assets/vendors/swiper/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="/telecall/assets/vendors/aos/aos/dist/aos.css">
    <link rel="stylesheet" href="/telecall/assets/layouts/nav.css">
    <link rel="stylesheet" href="/telecall/assets/layouts/acessibilidade.css">
    <script src="/telecall/assets/js/jquery-3.7.0.js.js"></script>
    <script src="/telecall/assets/js/acessibilidade.js"></script>
    <script src="/telecall/assets/framework/bulma/bulma/bulma-toast/dist/bulma-toast.min.js"></script>
    <script src="/telecall/assets/vendors/swiper/swiper/swiper-element-bundle.min.js"></script>
    <script src="/telecall/assets/vendors/aos/aos/dist/aos.js"></script>
</head>

<body>

    < <section class="section">
        <h1 class="title is-2 is-italic">
            <span class="red sombra">Modelo Físico</span>
        </h1>
        <div class='container has-text-centered'>
            <div class='columns is-mobile is-centered'>
                <div class='column'>
                    <div class="card">
                        <div class="card-content">
                            <div class="box">
                                <pre class="is-size-5">

--
-- Banco de dados: `telecall`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `autenticacao`
--

CREATE TABLE `autenticacao` (
  `id_autenticacao` int(11) NOT NULL,
  `autenticacao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `autenticacao`
--

INSERT INTO `autenticacao` (`id_autenticacao`, `autenticacao`) VALUES
(1, 'Nome da mãe'),
(2, 'Cep'),
(3, 'Data de nascimento');

-- --------------------------------------------------------

--
-- Estrutura para tabela `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `ip` int(10) UNSIGNED DEFAULT NULL,
  `data_hora` datetime NOT NULL,
  `login_status` varchar(7) DEFAULT NULL,
  `fk_id_usuario` int(11) NOT NULL,
  `fk_id_autenticacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_perfil`
--

CREATE TABLE `tipo_perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tipo_perfil`
--

INSERT INTO `tipo_perfil` (`id_perfil`, `perfil`) VALUES
(1, 'Master'),
(2, 'Comum');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `nome_materno` varchar(60) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `cpf` char(11) NOT NULL,
  `tel_celular` varchar(13) NOT NULL,
  `tel_fixo` varchar(12) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `login` char(6) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cep` char(8) NOT NULL,
  `fk_id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;




--
-- Índices de tabela `autenticacao`
--
ALTER TABLE `autenticacao`
  ADD PRIMARY KEY (`id_autenticacao`);

--
-- Índices de tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_log_usuario1_idx` (`fk_id_usuario`),
  ADD KEY `fk_log_autenticacao1_idx` (`fk_id_autenticacao`);

--
-- Índices de tabela `tipo_perfil`
--
ALTER TABLE `tipo_perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk_id_perfil` (`fk_id_perfil`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autenticacao`
--
ALTER TABLE `autenticacao`
  MODIFY `id_autenticacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tipo_perfil`
--
ALTER TABLE `tipo_perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_id_autenticacao` FOREIGN KEY (`fk_id_autenticacao`) REFERENCES `autenticacao` (`id_autenticacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_id_perfil` FOREIGN KEY (`fk_id_perfil`) REFERENCES `tipo_perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--INICIO DO EMAIL PARA CONTATO-->
    <div class="section has-background-light contact" id="contact">
        <div class="container">
            <div class="columns is-multiline" data-aos="fade-in-up" data-aos-easing="linear">
                <div class="column is-12 about-me">
                    <h1 class="title has-text-centered section-title red">
                        ENTRE EM CONTATO PELO EMAIL
                    </h1>
                </div>
                <div class="column is-8 is-offset-2">
                    <form action="#" method="POST">
                        <div class="field">
                            <label class="nome red">Nome</label>
                            <div class="control has-icons-left">
                                <input class="input" type="text" placeholder="Ex. Vasco da Gama" name="Name" />
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="email red">Email</label>
                            <div class="control has-icons-left">
                                <input class="input" type="email" placeholder="Ex. vasco@gmail.com" name="Email" />
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label red">Message</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="CHORA QUE EU TE ESCUTO" name="Message"></textarea>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-large is-fullwidth  is-link submit-button">
                                    Enviar&nbsp;&nbsp; <!--Espaço sem quebra-->
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--FINAL DO EMAIL PARA CONTATO-->
    <!--FOOTER-->
    <!--FOOTER-->


    <footer id="footer" class="mt-4">
        <div class="container">
            <div class="columns is-multiline is-centered">
                <div class="column is-4-fullhd is-3-widescreen is-4-desktop is-6-tablet is-12-mobile mb-6">
                    <a href="/telecall/home" class="logo is-flex is-centered">
                        <img alt="telecall" src="/telecall/assets/img/telecall-nome.png" height="35" width="150">
                    </a>
                    <p class="subtitle is-6 footer-description">
                        contatos: <br>
                        Email: suporte@telecall.com <br>
                        Tel: (21) 3030-1010
                    </p>
                    <div class="social-links is-flex mt-3">
                        <a href="https://www.linkedin.com/company/telecall?originalSubdomain=br" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://www.facebook.com/TelecallBr/?locale=pt_BR" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/telecallbr/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="mailto:suporte@telecall.com" target="_blank">
                            <i class="fa fa-envelope"></i>
                        </a>
                    </div>
                </div>
                <div class="column is-2-widescreen is-4-desktop is-6-tablet is-12-mobile">
                    <a href="/telecall/internet" <h3 class="pb-1 mb-0 is-size-6 has-text-weight-bold">Internet</h3></a>
                    <nav class="footer-nav">
                        <ul>
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="/telecall/internet/internetDedicada">Internet</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-chevron-right" style="color: #cc0000;"></i>
                                <a class="">Banda larga</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-chevron-right" style="color: #cc0000;"></i>
                                <a>Wi-fi</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="column is-2-widescreen is-4-desktop is-6-tablet is-12-mobile">
                    <a href="/telecall/telefonia">
                        <h3 class="pb-1 mb-0 is-size-6 has-text-weight-bold">Telefonia</h3>
                    </a>
                    <nav class="footer-nav">
                        <ul>
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="/telecall/telefonia/pabx">PABX IP Virtual</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-chevron-right" style="color: #cc0000;"></i>
                                <a>Números 0800 e 40XX</a>
                            </li>

                        </ul>
                    </nav>
                </div>
                <div class="column is-2-widescreen is-4-desktop is-6-tablet is-12-mobile">
                    <a href="/telecall/infra">
                        <h3 class="pb-1 mb-0 is-size-6 has-text-weight-bold">Rede e Infraestrutura</h3>
                    </a>
                    <nav class="footer-nav">
                        <ul>
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="/telecall/infra/pontoAPonto">Ponto a Ponto</a>
                            </li>
                            <i class="fa-solid fa-chevron-right" style="color: #cc0000;"></i>
                            <a>MPLS</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-chevron-right" style="color: #cc0000;"></i>
                                <a>Fibra Apagada e Dutos</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-chevron-right" style="color: #cc0000;"></i>
                                <a>Co-location</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="column is-2-fullhd is-3-widescreen is-4-desktop is-6-tablet is-12-mobile">
                    <a href="/telecall/mobilidade">
                        <h3 class="pb-1 mb-0 is-size-6 has-text-weight-bold">Mobilidade</h3>
                    </a>
                    <nav class="footer-nav">
                        <ul>
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="/telecall/mobilidade/celularEmp">Celular Empresarial</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-chevron-right" style="color: #cc0000;"></i>
                                <a>MPLS</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-chevron-right" style="color: #cc0000;"></i>
                                <a>MVNA/E</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container copyright">
            <div class="copyright-text has-text-centered">


                Copyright © 2023 Telecall. Todos os direitos reservados.

            </div>
        </div>

    </footer>

    <?php
    var_dump($_GET); ?>
    <!--FINAL DA FOOTER -->

    <!--PRINCIPAIS SCRIPTS-->
    <script src="/telecall/assets/js/fade.js"></script>
    <script src="/telecall/assets/js/mobilemenu.js"></script>
    <script src="/telecall/assets/js/index.js"></script>
</body>

</html>