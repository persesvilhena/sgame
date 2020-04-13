<?php
echo"
	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"titulo\">Sobre o jogo</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
		<span class=\"texto\">
			O jogo de cartas cujo nome original é SGames, é baseado em batalhas de cartas entre usuários que estão em sua lista de contatos. 
As Cartas são Álbuns de bandas que valem um determinado valor para as batalhas de acordo com quantidades de vendas, número de fãs e pontos.
Efeitos de Cartas: Cada efeito aumenta em uma porcentagem a pontuação das cartas de acordo com o tipo de cartas, e tipo de efeito. 
O Jogo possui uma moeda o “Cash” que será utilizado para comprar cartas e efeitos de cartas.
O jogo possui um Ranking que são as pontuações recebidas nas batalhas. 
A batalha é disputado em round único, onde cada intervalo entre batalhas são de " . $engine->tempo_batalha_simples . " segundos. O jogo possui dois tipos de batalhas: Assalto e Ataque;

Assalto: Onde o atacante e o defensor não perdem suas respectivas cartas, o vencedor recebe “Cash” e “Pontos”.
Ataque: Este tipo de batalha, o vencedor leva a carta do oponente derrotado, ou perde a carta caso perca a batalha, mas também ganha pontos.
		</span>

	</div><br>
	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"titulo\">Regras do jogo</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
		<span class=\"texto\">
			<span class=\"titulo\">Batalhas</span><br>
			<p>
				As batalhas são liberadas a cada " . $engine->tempo_batalha_simples . " segundos, sendo assim podendo batalhar com outros jogadores.
				 Para batalhar é necessário ter contatos em sua lista, para isso pode acessar o ranking e ver todos os jogadores que estão cadastrados no jogo, 
				 clicando no jogador e entrando no seu perfil você pode adicionar o jogador na sua lista de contatos.<br>
				 Ao batalhar você poderá escolher uma carta que está em seu dock de ataque, está carta possui pontos (quantidade de vendas, pontos, quantidade de fãs), 
				 você poderá escolher um desses 3 critérios de pontos para utilizar como pontos na batalhas, também é possível utilizar efeitos especiais que deverão ser comprados na página principal,
				 cada efeito acrescenta porcentagem em cima do critério escolhido para a batalha.<br>
				 Existem dois modos de batalha: Assalto e Ataque. No modo assalto nem o atacante nem o defensor perdem cartas, apenas o atacante caso ganhe, ganha pontos e cash apenas. Já no modo
				  ataque o ganhador da batalha ganha a carta, lembrando que o jogador atacado terá como carta escolhida alguma da carta que se encontre no dock de defesa, caso não possua cartas no dock 
				  de defesa, será escolhida qualquer carta do jogador atacado, com exceção aquelas cartas que estiverem no dock oculto, além da carta o ganhador da batalha também ganha pontos, cartas que 
				  se encontram no dock de defesa possuem " . $engine->bonus_de_carta_defesa . "% a mais de pontos caso atacadas.
			</p>
			<span class=\"titulo\">Bônus</span><br>
			<p>
				Também é possível ganhar pontos que são liberados a cada " . $engine->tempo_batalha_completa . " segundos, assim que liberado o bônus é possível coletá-lo ganhando pontos e cash.
				 A quantidade de cash e pontos que você irá ganhar no bônus irá depender do somatório do valor das cartas que você possui, 
				 em cima do somatório você irá ganhar " . $engine->porcentagem_ganho_cartas_cash . "% desse valor em cash e " . $engine->porcentagem_ganho_cartas_pts . "% desse valor em pontos.
			</p>
		</span>

	</div><br>
	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"titulo\">Páginas</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
		<span class=\"texto\">
			<span class=\"titulo\">Home</span><br>
			<p>
				Se encontra os docks de ataque, defesa, oculto, efeitos especiais e geral:<br>Dock de ataque: Cartas que seram utilizadas nas batalhas quando for atacar.<br>Dock de defesa: Cartas que seram preferecialmente 
				escolhidas caso o jogador sofra um ataque, estas cartas possuem " . $engine->bonus_de_carta_defesa . "% a mais de pontos caso atacadas.<br>Dock oculto: Cartas que não seram utilizadas em  batalhas, 
				tanto em ataque como em defesa, é uma forma de proteger estas cartas.<br>Dock de efeitos especiais: São os efeitos que o jogador possui para serem utilizados em batalhas.
				<br>Dock geral: Todas as cartas do jogador.
			</p>
			<span class=\"titulo\">Relatórios</span><br>
			<p>
				Se encontra os relatórios de todas as batalhas que o jogador fez ou sofreu.
			</p>
			<span class=\"titulo\">Livro Das Cartas</span><br>
			<p>
				São todas as cartas que possuem no jogo, é a pagina onde é possível compra-las.
			</p>
			<span class=\"titulo\">Mural</span><br>
			<p>
				Se encotra as postagens feitas pelos jogadores que estão na sua lista de contatos.
			</p>
			<span class=\"titulo\">Perfil</span><br>
			<p>
				Sua página de perfil, sendo possível fazer postagens, e alterações no seu perfil pessoal.
			</p>
			<span class=\"titulo\">Mensagens</span><br>
			<p>
				Todas as mensagens recebidas ou enviadas se encontra nesta página.
			</p>
			<span class=\"titulo\">Contatos</span><br>
			<p>
				São todos os seus contatos, que seram utilizados em batalhas ou no mural.
			</p>
			<span class=\"titulo\">Ranking</span><br>
			<p>
				Todos os jogadores cadastrados no jogo, ordenados por maior pontuação.
			</p>
			<span class=\"titulo\">Configurações</span><br>
			<p>
				Nela é possível, alterar sua senha, excluir sua conta, e alterar certas configurações.
			</p>
			<span class=\"titulo\">Sobre</span><br>
			<p>
				É a página que você está agora.
			</p>
			<span class=\"titulo\">Menu de links</span><br>
			<p>
				Nele é possível adicionar alguns links para auxiliar o jogador.
			</p>
		</span>

	</div>
";

?>