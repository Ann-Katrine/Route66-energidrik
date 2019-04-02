--USE Route66

CREATE OR ALTER PROCEDURE Opret_bruger
@Navn NVARCHAR(45),
@mail NVARCHAR(45),
@mobil INT
AS
BEGIN
	--så den sidster datoen 
	DECLARE @Monthbruger DATE = GETDATE();
	--Hvis bruger ikke findes
	IF(NOT EXISTS(SELECT Mailbruger FROM Bruger WHERE Bruger.Mailbruger = @mail))
		BEGIN		
			INSERT INTO Bruger (Navnbruger, Mailbruger, Mobilbruger, Har_rigtige, Vinder, Monthbruger) VALUES (@Navn, @mail, @mobil,0,0, @Monthbruger)
			PRINT 'bruger oprettet';
		END
	--Hvis bruger findes
	ELSE
		BEGIN
			--Hvis brugeren ikke har vundet
			IF((SELECT Vinder FROM Bruger WHERE Bruger.Mailbruger = @mail) = 0)
				BEGIN
					--Hvis brugeren ikke har oprettets sig i den måned
					IF(MONTH((SELECT TOP 1 Monthbruger FROM Bruger WHERE Bruger.Mailbruger = @mail ORDER BY Monthbruger))!= MONTH(GETDATE()))
						BEGIN
							INSERT INTO Bruger (Navnbruger, Mailbruger, Mobilbruger, Har_rigtige, Vinder, Monthbruger) VALUES (@Navn, @mail, @mobil,0,0, @Monthbruger)
							PRINT 'bruger oprettet igen';
						END
					--Hvis brugen er oprettet i den måned
					ELSE
						BEGIN
							RAISERROR ('er allerde oprettet i den måned', 16, 1);
						END
				END
			--Hvis brugeren har vundet
			ELSE 
				BEGIN
					RAISERROR ('person har allerde vundet', 16, 1);
				END
		END
END