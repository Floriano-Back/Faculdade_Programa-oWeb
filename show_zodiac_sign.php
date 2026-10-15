<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 card shadow-sm p-4 text-center resultado-card">
            <?php
            $data_nascimento = $_POST['data_nascimento'] ?? '';
            $signos = simplexml_load_file("signos.xml");

            // Gera o nome do arquivo da imagem a partir do nome do signo (sem acento, minúsculo)
            function slugSigno($nome) {
                $nome = mb_strtolower(trim((string)$nome), 'UTF-8');
                return strtr($nome, [
                    'á'=>'a','â'=>'a','ã'=>'a','à'=>'a','é'=>'e','ê'=>'e',
                    'í'=>'i','ó'=>'o','ô'=>'o','õ'=>'o','ú'=>'u','ç'=>'c'
                ]);
            }

            $signo_encontrado = null;

            if ($data_nascimento) {
                $data_usuario = new DateTime($data_nascimento);
                $user_str = sprintf("2000-%02d-%02d", $data_usuario->format('m'), $data_usuario->format('d'));

                foreach ($signos->signo as $signo) {
                    $parts_inicio = explode('/', (string)$signo->dataInicio);
                    $parts_fim = explode('/', (string)$signo->dataFim);

                    $data_inicio_str = sprintf("2000-%02d-%02d", $parts_inicio[1], $parts_inicio[0]);
                    $data_fim_str = sprintf("2000-%02d-%02d", $parts_fim[1], $parts_fim[0]);

                    // Capricórnio cruza o ano (22/12 a 19/01)
                    if ($data_inicio_str > $data_fim_str) {
                        $achou = ($user_str >= $data_inicio_str || $user_str <= $data_fim_str);
                    } else {
                        $achou = ($user_str >= $data_inicio_str && $user_str <= $data_fim_str);
                    }

                    if ($achou) {
                        $signo_encontrado = $signo;
                        break;
                    }
                }
            }

            if ($signo_encontrado) {
                $nome = htmlspecialchars((string)$signo_encontrado->signoNome);
                $slug = slugSigno($signo_encontrado->signoNome);
                ?>
                <div class="signo-icone">
                    <img src="assets/imgs/signos/<?= $slug ?>.svg" alt="Símbolo de <?= $nome ?>">
                </div>
                <h1 class="signo-titulo mb-3"><?= $nome ?></h1>
                <p class="lead"><?= htmlspecialchars((string)$signo_encontrado->descricao) ?></p>
                <p><span class="signo-periodo"><small>Período: <?= htmlspecialchars((string)$signo_encontrado->dataInicio) ?> a <?= htmlspecialchars((string)$signo_encontrado->dataFim) ?></small></span></p>
            <?php } else { ?>
                <div class="alert alert-danger">Não foi possível identificar o signo.</div>
            <?php } ?>

            <div class="mt-4">
                <a href="index.php" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>