create database projeto_estudo_php_vendas;
use projeto_estudo_php_vendas;
drop table produto;
create table produto(
pro_id integer primary key auto_increment,
pro_nome varchar(40) not null,
pro_descricao varchar(255) not null,
pro_preco double not null,
pro_url varchar(255)
)engine=InnoDB;

INSERT INTO produto (pro_nome, pro_descricao, pro_preco, pro_url) VALUES
('Cadeira de Escritório', 'Cadeira ergonômica com apoio lombar ajustável e rodinhas', 299.90, 'https://picsum.photos/500/300'),
('Mesa de Jantar', 'Mesa de jantar em madeira de 6 lugares', 799.00, 'https://picsum.photos/500/302'),
('Lâmpada LED', 'Lâmpada LED de 10W com eficiência energética', 19.90, 'https://picsum.photos/500/301'),
('Teclado Mecânico', 'Teclado mecânico com switches azuis e retroiluminação RGB', 149.90, 'https://picsum.photos/500/303'),
('Monitor 24"', 'Monitor Full HD de 24 polegadas com painel IPS', 499.00, 'https://picsum.photos/500/304'),
('Fone de Ouvido', 'Fone de ouvido com cancelamento de ruído e microfone integrado', 229.90, 'https://picsum.photos/500/305'),
('Cafeteira Expresso', 'Cafeteira expresso com função cappuccino e controle digital', 349.90, 'https://picsum.photos/500/306'),
('Notebook Gamer', 'Notebook com processador i7, 16GB RAM e placa de vídeo GTX 1660', 3899.00, 'https://picsum.photos/500/307'),
('Livro de Programação', 'Livro completo sobre linguagens de programação modernas', 89.90, 'https://picsum.photos/500/308'),
('Câmera Digital', 'Câmera digital com 20MP e lente zoom de 10x', 899.00, 'https://picsum.photos/500/309');

create table user(
user_id integer primary key auto_increment,
user_nome varchar(80) not null,
user_email varchar(80) not null unique,
use_pwd text not null) engine=InnoDB;
select * from produto;