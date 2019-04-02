--USE Route66

CREATE OR ALTER PROCEDURE Qusten_and_svar
@Qusten NVARCHAR(45),
@svar1 NVARCHAR(45),
@svar2 NVARCHAR(45),
@svar3 NVARCHAR(45)
AS
BEGIN
	IF(NOT EXISTS(SELECT Queten FROM Qusten WHERE Qusten.Queten = @Qusten))
		BEGIN
			DECLARE @Qustenid INT;
			INSERT INTO Qusten (Queten) VALUES (@Qusten)
			SET @Qustenid = @@IDENTITY
			INSERT INTO Svarmulighed (Svarmuligheder, Idqusten_svarmulighed, Rigtige_eller_forkert) VALUES (@svar1, @Qustenid, 1)
			INSERT INTO Svarmulighed (Svarmuligheder, Idqusten_svarmulighed, Rigtige_eller_forkert) VALUES (@svar2, @Qustenid, 0)
			INSERT INTO Svarmulighed (Svarmuligheder, Idqusten_svarmulighed, Rigtige_eller_forkert) VALUES (@svar3, @Qustenid, 0)
		END
END