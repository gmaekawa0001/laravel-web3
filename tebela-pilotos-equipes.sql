CREATE TABLE Equipe(id serial, nome varchar(100), PRIMARY KEY(id));
CREATE TABLE Piloto(id serial, nome varchar(110), numero numeric, data_nasc date, equipe_id integer, PRIMARY KEY(id), FOREIGN KEY(equipe_id) REFERENCES Equipe(id));

INSERT INTO Equipe(nome) VALUES ('RED BULL RACING'), ('FERRARI'), ('ASTON MARTIN'), ('MERCEDES'), ('MCLAREN');
SELECT * FROM Equipe;
INSERT INTO Piloto(nome, numero, data_nasc, equipe_id) VALUES ('Lewis Carl Davidson Hamilton', 44, '1985-01-07', 2);

SELECT p.*, e.nome AS equipe FROM Piloto p JOIN equipe e ON e.id = p.equipe_id ORDER BY nome, id;
