--USE Route66

CREATE OR ALTER PROCEDURE se_alle_der_har_vundet
AS
BEGIN
	SELECT * FROM Bruger WHERE Bruger.Vinder = 1;
END