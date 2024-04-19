# Painel antigo Rádio Brasileira
Esta é a versão refeita (provavelmente de 17/11/2020) de um painel que eu fiz como um dos meus primeiros grandes projetos.

Claro que era horrível! Eu mal sabia mexer em PHP. Esse aqui continua sendo ruim, mas pelo menos os menus eram mais bonitinhos, e o PHP era mais organizado. <i>“Mas ele não é ruim?”</i>: então, imagine como era o original!

Lembro vagamente de programar a versão anterior, e sofrer até pra fazer o sistema de login funcionar.

Claro, se for usar isso aqui, revise tudo direitinho. Especialmente, delete a tabela que registra as tentativas de login, porque simplesmente é a coisa mais esquizofrênica do planeta. Imagine querer guardar qual a senha que a pessoa tentou inserir, sem criptografia.

E claro, não saia por aí vendendo, como se fosse algo teu.

# Como usar essa bomba
Para usar essa bomba é simples. Baixe e cole a pasta "rbr-painel" no htdocs do XAMPP (ou qualquer outro que esteja usando).

Depois, abra o phpmyadmin (ou qualquer outra plataforma pra mexer em banco MySQL) e crie um banco "radiobr", e importe o "rbr-painel.sql".

O usuário teste se chama "UsuarioImpossivelTeste", e sua senha é "senha123".

# Demonstração
[![Demonstração de como o painel funciona](https://img.youtube.com/vi/JLnQJiCV7eE/0.jpg)](https://www.youtube.com/watch?v=JLnQJiCV7eE)
