--USER Route66

CREATE OR ALTER PROCEDURE Trak_3_random_vinder
AS
BEGIN
	UPDATE TEMP
	SET vinder = 1
	FROM (SELECT TOP 3 *	FROM Bruger	WHERE Bruger.Vinder = 0 AND Bruger.Har_rigtige = 1 AND DATENAME(MONTH,Monthbruger) = DATENAME(MONTH, GETDATE()) ORDER BY NEWID()) AS TEMP
	WHERE (Har_rigtige = 1 AND DATENAME(MONTH,Monthbruger) = DATENAME(MONTH, GETDATE()))
END