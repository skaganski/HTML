#Tabli tegemine
create table skaganski_loomaaed (
  id integer Primary key auto_increment,
  nimi varchar (100) NOT Null,
  vanus integer default 1,
  liik varchar(100) Not null,
  puur integer
);
#Sisestamine
insert into skaganski_loomaaed values (1, 'Tom',23,'ahv',1);
  insert into skaganski_loomaaed values (2, 'Mot',10,'ahv',1);
    insert into skaganski_loomaaed values (3, 'Peeter',16,'elevant',2);
      insert into skaganski_loomaaed values (4, 'Siim',10,'tiiger',3);
        insert into skaganski_loomaaed values (5, 'Olev',7,'tiiger',3);
#Päringud
select * from skaganski_loomaaed where puur=1 order by nimi;
select max(vanus), min(vanus) from skaganski_loomaaed;
select puur, count(*) as loomad from skaganski_loomaaed group by puur;
update skaganski_loomaaed set vanus=vanus+1;
