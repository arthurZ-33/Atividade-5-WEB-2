🚀 Repositório de Estudos PHP: A Jornada Começa
Este repositório serve como um registro de progresso e um campo de treinamento para o desenvolvimento em PHP, focado em aprimorar a lógica de programação, o processamento de formulários (POST) e a aplicação de boas práticas básicas, como validação e sanitização de dados.

Cada projeto é uma peça do quebra-cabeça na construção de um entendimento sólido sobre o ecossistema Web backend. Por favor, ignore a estética (CSS é o inimigo, por enquanto).

⚙️ Projetos Contidos
Este repositório inclui dois projetos independentes de demonstração:

1. Bilheteria de Alto Nível (e Baixo Esforço)
Arquivo Principal: geradorRifas.php

O que é: Uma aplicação simples para gerar bilhetes de rifa customizados a partir de entradas de formulário.

Foco no Aprendizado:

Manipulação de requisições POST e injeção de dados no HTML.

Validação e Sanitização de inputs (usando filter_input e flags como FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_SPECIAL_CHARS, e FILTER_SANITIZE_NUMBER_FLOAT).

Uso de loops (for) para renderização dinâmica de conteúdo.

Formatação de números (moeda) com number_format e padding de strings com str_pad.

O Toque de Mestre (Humor Sutil): Sim, ele aceita um valor de bilhete em formato float. Não, ele não te transformará em um magnata da filantropia digital.

2. Jo-Ken-Pô: A Insurreição da CPU
Arquivo Principal: jokenpo_game.php

O que é: O clássico jogo Pedra, Papel e Tesoura, implementado em PHP.

Foco no Aprendizado:

Uso de Constantes (define) para melhorar a legibilidade do código e evitar "números mágicos" na lógica de jogo.

Implementação de lógica de decisão complexa (if/else encadeados ou compostos) em uma função dedicada (comparaJogadas).

Geração de números aleatórios (rand) para simular a "inteligência" da máquina.

Uso de arrays associativos ($opcoes) para mapear dados (nome da jogada, caminho da imagem) e centralizar informações.

Controle de fluxo de interface ($mostrarResultado) para renderização condicional.

O Toque de Mestre (Humor Sutil): A inteligência artificial é de "baixíssimo custo". O que esperar de uma máquina que só sabe rodar um rand()? A sinceridade aqui é a piada.

💻 Como Executar
Para testar esta obra de arte:

Clone este repositório para sua máquina local.

Certifique-se de ter um ambiente PHP e um servidor Web (Apache, Nginx, ou um ambiente local como XAMPP/MAMP/Laragon) configurados.

Coloque os arquivos na raiz do seu servidor.

Acesse geradorRifas.php e jokenpo_game.php via seu navegador.

Nota para devs: O projeto Jo-Ken-Pô espera que você tenha uma pasta imgs na raiz com as imagens de pedra.png, papel.png, e tesoura.png. Se a CPU não está jogando, a culpa é sua.

💡 Status do Projeto: Aprendiz em Nível Beta
Como um desenvolvedor em fase inicial, estou focando na funcionalidade e na lógica de backend. O código pode conter easter eggs na forma de comentários... e potenciais falhas que só um jovem Padawan pode cometer.

Contribuições, sugestões e críticas construtivas são bem-vindas. Afinal, até o Batman precisa de um Alfred para apontar quando ele está agindo como um idiota.
