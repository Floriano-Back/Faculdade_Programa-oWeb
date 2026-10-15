## 🔮 Qual seu Signo
Aplicação web em PHP que descobre o signo do zodíaco a partir da data de nascimento informada pelo usuário. Os dados dos signos ficam em um arquivo XML, e o resultado é exibido com o símbolo do signo.

Trabalho acadêmico desenvolvido para a disciplina de Programação WEB.

## ✨ Funcionalidades
Formulário para informar a data de nascimento
Identificação do signo lendo os dados de um arquivo XML (simplexml_load_file)
Tratamento do signo de Capricórnio, que atravessa a virada do ano (22/12 a 19/01)
Exibição do nome, da descrição, do período e do símbolo do signo
Layout responsivo com Bootstrap e tema personalizado em CSS

## 🛠️ Tecnologias
```
PHP
XML
HTML5 e CSS3
Bootstrap 5.2
```

## 📁 Estrutura do projeto
```
Project/
├── index.php                 # Página inicial com o formulário
├── show_zodiac_sign.php      # Processa a data e exibe o signo
├── signos.xml                # Dados dos 12 signos
├── layouts/
│   └── header.php            # Cabeçalho compartilhado
└── assets/
    ├── css/
    │   ├── bootstrap.min.css
    │   └── style.css         # Estilos personalizados
    └── imgs/
        └── signos/           # Símbolos dos signos em SVG
```

## 🚀 Como executar
Pré-requisitos
PHP 7.4 ou superior
Um servidor local como XAMPP, WAMP ou Laragon (ou o servidor embutido do PHP)

Passo a passo
Clone o repositório:
bash
   git clone https://github.com/Floriano-Back/Faculdade_Programa-oWeb.git
Coloque a pasta do projeto dentro do diretório do servidor (por exemplo, htdocs no XAMPP).
Inicie o Apache.
Acesse no navegador:
   http://localhost/Project/index.php

Alternativa com o servidor embutido do PHP, sem precisar do XAMPP:

bash
cd Project
php -S localhost:8000

Depois acesse http://localhost:8000.

## 🧩 Como funciona
O usuário informa a data de nascimento em index.php.
O formulário envia os dados por POST para show_zodiac_sign.php.
O PHP carrega o signos.xml e compara o dia e o mês da data com o período de cada signo.
O signo encontrado é exibido com o símbolo correspondente, buscado em assets/imgs/signos/. O nome do arquivo é o nome do signo sem acento e em minúsculas, por exemplo gemeos.svg.
Formato do signos.xml
xml
<signos>
    <signo>
        <dataInicio>21/03</dataInicio>
        <dataFim>20/04</dataFim>
        <signoNome>Áries</signoNome>
        <descricao>Descrição do signo.</descricao>
    </signo>
    <!-- ... -->
</signos>

Para alterar a descrição de um signo, basta editar a tag <descricao> no XML.

## 📄 Licença
Projeto desenvolvido para fins educacionais.