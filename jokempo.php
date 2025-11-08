<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mapeamento numérico das jogadas para facilitar a lógica (1, 2, 3)
define('PEDRA', 1);
define('PAPEL', 2);
define('TESOURA', 3);


define('CAMINHO_PEDRA', 'imgs/pedra.png');
define('CAMINHO_PAPEL', 'imgs/papel.png');
define('CAMINHO_TESOURA', 'imgs/tesoura.png');

// Mapeamento completo para exibição e imagens
$opcoes = [
    PEDRA => ['nome' => 'Pedra 🗿', 'caminho_img' => CAMINHO_PEDRA],
    PAPEL => ['nome' => 'Papel 📜', 'caminho_img' => CAMINHO_PAPEL],
    TESOURA => ['nome' => 'Tesoura ✂️', 'caminho_img' => CAMINHO_TESOURA]
];

// Variáveis de estado
$resultado = "";
$jogadaComputador = null;
$jogadaJogador = null;

/**
 * A inteligência artificial de baixíssimo custo (o cerne da preguiça).
 * Compara as jogadas e decide quem ganhou.
 *
 * @param int $jogador Jogada do jogador (1, 2 ou 3)
 * @param int $computador Jogada do computador (1, 2 ou 3)
 * @return string O resultado da partida.
 */
function comparaJogadas($jogador, $computador) {
    if ($jogador == $computador) {
        return 'Empate 🤝 (O universo está em equilíbrio. Chato.)';
    }

    // Condições de vitória do jogador.
    if (
        ($jogador == PEDRA && $computador == TESOURA) || // Pedra quebra Tesoura
        ($jogador == PAPEL && $computador == PEDRA) ||   // Papel embrulha Pedra
        ($jogador == TESOURA && $computador == PAPEL)    // Tesoura corta Papel
    ) {
        return 'Vitória 😎 (Você não é tão inútil quanto eu pensei!)';
    }
    
    // Se não é empate nem vitória, só pode ser derrota.
    return 'Derrota 😭 (Máquina > Ser Humano. Aceita que dói menos.)';
}

// === 2. PROCESSAMENTO DO FORMULÁRIO (A mágica do POST) ===

// === 2. PROCESSAMENTO DO FORMULÁRIO (A mágica do POST) ===
$mostrarResultado = false; // Variável de controle

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura e sanitiza a escolha do jogador
    $jogadaJogador = filter_input(INPUT_POST, 'escolha', FILTER_VALIDATE_INT);
    
    // O computador decide o destino do seu ego
    $jogadaComputador = rand(PEDRA, TESOURA);

    // Validação ultra-rápida
    if (in_array($jogadaJogador, [PEDRA, PAPEL, TESOURA])) {
        // Rola a comparação
        $resultado = comparaJogadas($jogadaJogador, $jogadaComputador);
        $mostrarResultado = true; // Deu tudo certo, pode mostrar o placar
    } else {
        // Mensagem de erro zoeira
        $resultado = "Selecione uma opção válida, gênio. Não inventa moda!";
        $jogadaJogador = null; // Reseta
        $jogadaComputador = null; // Reseta
        $mostrarResultado = false; // Não mostra o placar, só o erro
    }
}
?>

<?php if ($mostrarResultado): ?>
    <div class="container">
        <h2>Resultado da Treta Cósmica:</h2>
        
        <div class="resultado-box">
            <p class="resultado"><?= htmlspecialchars($resultado) ?></p>

            <div class="placar">
                
                <div class="jogada">
                    <h3>Sua Jogada:</h3>
                    <img 
                        src="<?= $opcoes[$jogadaJogador]['caminho_img'] ?>" 
                        alt="<?= $opcoes[$jogadaJogador]['nome'] ?>"
                        title="<?= $opcoes[$jogadaJogador]['nome'] ?>">
                    <p><strong><?= $opcoes[$jogadaJogador]['nome'] ?></strong></p>
                </div>

                <div class="jogada">
                    <h3>Jogada da Máquina:</h3>
                    <img 
                        src="<?= $opcoes[$jogadaComputador]['caminho_img'] ?>" 
                        alt="<?= $opcoes[$jogadaComputador]['nome'] ?>"
                        title="<?= $opcoes[$jogadaComputador]['nome'] ?>">
                    <p><strong><?= $opcoes[$jogadaComputador]['nome'] ?></strong></p>
                </div>
            </div>
            
            <form action="jokenpo_game.php" method="get">
                <button type="submit" class="escolha-form button">
                    Jogar Novamente (Para que sofrer mais?)
                </button>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($resultado != "" && !$mostrarResultado && $_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <div class="container">
        <div style="background-color: #ff5757; color: white; padding: 10px; border-radius: 4px;">
            <p><?= htmlspecialchars($resultado) ?></p>
        </div>
    </div>
    <?php endif; ?>

</body>
</html>