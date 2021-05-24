<?php
  
?>
<html>
<head>
  
</head>
<body>
  <main>
    <div class="container">
        <div class="inicio_processo">
            <div>INÍCIO:
                <?php
                    if(isset($processo)) {
                        $d_processo = explode('-', $processo[0]['data_cadastro_processo']);
                        echo $d_processo[2].'/'.$d_processo[1].'/'.$d_processo[0];
                    }
                ?>
            </div>
        </div><!-- inicio_processo -->
        <?php
            /* echo "<pre>";
            print_r($comprador_pf);
            print_r($comprador_pj);
            echo "</pre>"; */
        ?>
        <div class="cabecalho_espelho">
            <div class="logo_espelho">
                <img src="C:/xampp/htdocs/Despachaimob/public/assets/images/logo_Original_J_Freitas.png">
            </div>
            <div class="cabecalho_texto">
                <div class="freitas"><strong>J.FREITAS</strong> CRECI nº <strong>12.535</strong> - 4ª REGIÃO/MG</div>
                <div class="corretor"><strong>CORRETOR</strong> de Imóveis / <strong>DESPACHANTE</strong> Imobiliário</div>
                <div class="fones">Fones: <strong>(32) 9-8808-0821 e CLÁUDIO (32) 9-8855-0458</strong></div>
            </div>
            <div class="cabecalho_processo">
                <span class="numero">NÚMERO</span>
                <span class="num_processo"><?= $processo[0]['numero_processo']; ?></span>
                <span class="indica"><?= $processo[0]['indicacao']; ?></span>
            </div>
        </div><!-- Cabeçalho Espelho -->

        <div class="endereco_espelho">
            <span>ENDEREÇO: Rua Halfeld, 414 sala 5100 (Ec. Antigo Banco Mineiro da Produção) JF / MG</span>
        </div>

        <div class="processo_compradores">
            <div class="dados_pessoais_compradores">
              <?php
                if(isset($comprador_pf)) {
                  foreach($comprador_pf as $dados) {
              ?>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="9" id="espelho">COMPRADOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="labels">Nome:</td>
                                <td colspan="6" class="info-importantes"><?= $dados['nome']; ?></td>
                                <td class="labels">CPF:</td>
                                <td class="info-importantes"><?= $dados['cpf']; ?></td>
                            </tr>
                            <tr>
                              <td class="labels">Nacionalidade:</td>
                              <td class="info-importantes"><?= $dados['nacionalidade']; ?></td>
                              <td class="labels">Profissão:</td>
                              <td colspan="4" class="info-importantes"><?= $dados['profissao']; ?></td>
                              <td class="labels">Nasc.:</td>
                              <td class="info-importantes"><?= $dados['nascimento']; ?></td>
                            </tr>
                            <tr>
                              <td class="labels">Data Casamento:</td>
                              <td class="info-importantes"><?= $dados['data_casamento']; ?></td>
                              <td class="labels">Estado Civíl:</td>
                              <td colspan="3" class="info-importantes"><?= $dados['tipo_regime']; ?></td>
                              <td class="labels">Nasc.:</td>
                              <td class="info-importantes"><?= $dados['nascimento']; ?></td>
                            </tr>
                        </tbody>
                    </table>
              <?php
                  }
                }
              ?>
            </div>
            
        </div><!-- processo_compradores -->
    </div><!-- Container -->
  </main>
</body>
</html>
