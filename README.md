### 🐱‍🐉 Projeto Agro Bom Negócio - ABC
##### *Desenvolvido e entregue por [Phog Tech](https://phogtech.vercel.app/)*
#### 🤯 Processo de desenvolvimento
O desenvolvimento foi realizado inicialmente com o front-end sendo desenvolvido pelo [Murata](https://github.com/Muratawga), criando a estilização da identidade visual do projeto. Paralelamente, [Vitor](https://github.com/vit0rr) ajudava com problemas específicos no front-end, implementou o gráfico de preços para os produtos e realizou testes de segurança para corrigir falhas SQL, XSS etc.
No back-end, [Pedro](https://github.com/dgtyPedro) desenvolveu o banco de dados e suas funcionalidades usando PHP e SQL, criando uma relação orgânica com o front-end durante todo o projeto.

#### 🐱‍👤Como funciona tecnicamente o projeto?
O projeto Agro Bom Comércio consiste numa loja, onde é possível inserir produtos, remover, adicionar na lista de desejos e consultar gráfico de preços.

***No front-end:***
O JavaScript teve um papel importante no gráfico de preços. Basicamente, através da biblioteca [Chart.js](https://www.chartjs.org/) configuramos para ela trabalhar com variáveis do PHP. Dessa forma, os preços ficam atualizados mantendo um histórico em tempo real, sendo possível modificá-lo com o Crud.

***No back-end:***
Com PHP, foi desenvolvido a exibição dinâmica de produtos na home do site. Também foi criado um CRUD, por onde é feito toda a configuração dos produtos, como nome, imagem e ID dos produtos de forma automática, assim como os preços, sendo possível armazená-los numa variável para que sejam passados para o gráfico de preço em cada produto.
Com isso, existe uma lista de desejos também usando o CRUD, onde é possível consultar todos os produtos adicionados, removê-los e acessar a página única deles.
O cliente também pediu um gerador de pdfs, que usa a biblioteca mpdf, nela o PHP consegue criar um arquivo HTML que após o processo é convertido em PDF e posto para download no navegador do usuário.