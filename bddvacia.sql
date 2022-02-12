/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     11/02/2022 8:14:06 p. m.                     */
/*==============================================================*/


drop table if exists CARRITOCOMPRAS;

drop table if exists PRODUCTO;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: CARRITOCOMPRAS                                        */
/*==============================================================*/
create table CARRITOCOMPRAS
(
   CARR_ID              int not null,
   PRO_ID               int not null,
   USU_ID               int not null,
   CARR_CANT            int not null,
   primary key (CARR_ID)
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO
(
   PRO_ID               int not null,
   PRO_NOMBRE           varchar(50) not null,
   PRO_PRECIO           int not null,
   PRO_IMAGEN           longblob not null,
   PRO_DESCRIPCION      varchar(50),
   PRO_CANTIDAD         int not null,
   PRO_CATEGORIA        varchar(50) not null,
   primary key (PRO_ID)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   USU_ID               int not null,
   CARR_ID              int,
   USU_NOMBRE           varchar(50) not null,
   USU_PASSWORD         varchar(50) not null,
   USU_EMAIL            varchar(50) not null,
   USU_ROL              varchar(10) not null,
   primary key (USU_ID)
);

alter table CARRITOCOMPRAS add constraint FK_ALMACENA foreign key (PRO_ID)
      references PRODUCTO (PRO_ID) on delete restrict on update restrict;

alter table CARRITOCOMPRAS add constraint FK_POSEE2 foreign key (USU_ID)
      references USUARIO (USU_ID) on delete restrict on update restrict;

alter table USUARIO add constraint FK_POSEE foreign key (CARR_ID)
      references CARRITOCOMPRAS (CARR_ID) on delete restrict on update restrict;

