--USE Route66

CREATE OR ALTER PROCEDURE Hvis_svar_er_rigtige
@mail NVARCHAR(45)
AS
BEGIN
	 UPDATE Bruger
	 SET Har_rigtige = 1
	 WHERE Bruger.Mailbruger = @mail AND DATENAME(MONTH,Monthbruger) = DATENAME(MONTH, GETDATE())
END