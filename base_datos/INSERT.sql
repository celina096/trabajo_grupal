-- inserto registros de banco
-- INSERT bancos (banco_nombre, estado)
-- VALUES ("FRANCES", 1)

-- select * from bancos
-- actualizo registros
-- update bancos set estado = 1 where idbancos = 3
delete from chequera where idchequera =3

-- INSERT cuentas_bancaria (num_cuenta,banco_id) VALUES ("cuenta 2", 5)


-- inserto registros de chequera
INSERT chequera (numero_chequera, cantidad_cheques, desde,hasta,cuenta_bancaria_id)
VALUES (1, 25,101,150,7)

select * from movies 

INSERT condicion_cheque (condicion_cheque) VALUES ("NO A LA ORDEN")
INSERT movimientos_bancarios (movimientos_nombre) VALUES ("TRANSFERENCIAS A TERCEROS")
INSERT cheque (numero_cheque,importe_cheque,fecha_emision,fecha_cobro,destinatario,estado_cheque,movimiento_bancario_id,chequera_id,condicion_id)
VALUES (61, 10580,"2017-09-30","2017-10-15","HERNAN",1,1,6,2)

