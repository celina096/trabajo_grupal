-- UNO CUENTAS BANCARIAS CON BANCO
SELECT banco_nombre AS BANCO,num_cuenta AS CUENTA_BANCARIA
FROM cuentas_bancaria
JOIN bancos ON banco_id = bancos.idbancos

-- UNO CHEQUERA CON CUENTA Y CON BANCO
SELECT banco_nombre AS BANCO,num_cuenta AS CUENTA_BANCARIA, numero_chequera AS CHEQUERA_NUMERO, cantidad_cheques AS CANT_CH, desde AS DESDE, hasta AS HASTA
FROM chequera
JOIN cuentas_bancaria ON cuenta_bancaria_id = idcuentas_bancaria
JOIN bancos ON banco_id = bancos.idbancos

-- MUESTRO LOS CHEQUES
SELECT CONCAT (banco_nombre," ",num_cuenta) AS BANCO, numero_cheque AS NUM_CH, importe_cheque AS IMPORTE, fecha_emision AS FECHA_EMISION, fecha_cobro AS FECHA_COBRO, destinatario AS DESTINATARIO, condicion_cheque as CONDICION
FROM cheque
JOIN chequera on chequera_id = idchequera
JOIN cuentas_bancaria ON cuenta_bancaria_id = idcuentas_bancaria
JOIN bancos ON banco_id = bancos.idbancos
JOIN condicion_cheque ON condicion_id = idcondicion_cheque

--MUESTRO LOS REGISTROS DE GASTOS
