IF NOT EXISTS (SELECT name FROM sys.databases WHERE name = 'ubb_perfeccionamiento')
BEGIN
    CREATE DATABASE ubb_perfeccionamiento;
END
GO

USE ubb_perfeccionamiento;
GO

IF NOT EXISTS (SELECT * FROM sysobjects WHERE name='solicitudes' AND xtype='U')
BEGIN
    CREATE TABLE solicitudes (
        id              INT IDENTITY(1,1) PRIMARY KEY,
        folio           VARCHAR(20)   NOT NULL UNIQUE,
        rut_academico   VARCHAR(12)   NOT NULL,
        nombre_programa NVARCHAR(255),
        tipo            VARCHAR(50),
        estado          VARCHAR(50)   DEFAULT 'ENVIADA',
        fecha_envio     DATETIME      DEFAULT GETDATE(),
        fecha_update    DATETIME      DEFAULT GETDATE()
    );
END
GO