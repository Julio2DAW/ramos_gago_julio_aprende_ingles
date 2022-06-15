/**
    @file insertar_datos_prueba_practica.sql
    @description Script para realizar una inserción de datos para realizar la prueba de prácticas.
    @author Julio Antonio Ramos Gago <jramosgago.guadalupe@alumnado.fundacionloyola.net>.
*/

-- Usar BD aprende_inglés
use aprende_ingles;

-- Insertar datos en la tabla Categorías
INSERT INTO Categorias (nombre) VALUES
('Animales'),
('Colores'),
('Comida'),
('Países'),
('Profesiones');

-- Insertar datos en la tabla Palabras
INSERT INTO Palabras (espanol, ingles, categoria) VALUES
('Perro', 'Dog', 1),
('Gato', 'Cat', 1),
('Caballo', 'Horse', 1),
('Pez', 'Fish', 1),
('Oso', 'Bear', 1),
('Canario', 'Canary', 1),
('Camaleón', 'Chameleon', 1),
('Vaca', 'Cow', 1),
('Cerdo', 'Pig', 1),
('Conejo', 'Rabbit', 1),
('Negro', 'Black', 2),
('Azul', 'Blue', 2),
('Oro', 'Gold', 2),
('Gris', 'Gray', 2),
('Verde', 'Green', 2),
('Marfil', 'Ivory', 2),
('Naranja', 'Orange', 2),
('Rosa', 'Pink', 2),
('Rojo', 'Red', 2),
('Plateado', 'Silver', 2),
('Aceite', 'Oil', 3),
('Ajo', 'Garlic', 3),
('Anchoa', 'Anchovy', 3),
('Arroz', 'Rice', 3),
('Avellana', 'Hazelnut', 3),
('Carne', 'Meat', 3),
('Pollo', 'Chicken', 3),
('Castaña', 'Chestnut', 3),
('Cebolla', 'Onion', 3),
('Coliflor', 'Cauliflower', 3),
('Bélgica', 'Belgium ', 4),
('Bosnia y Herzegovina', 'Bosnia and Herzegovina', 4),
('Birmania', 'Burma', 4),
('Cabo Verde', 'Cape Verde', 4),
('Islas Caimán', 'Cayman Islands', 4),
('Croacia', 'Croatia', 4),
('Chipre', 'Cyprus', 4),
('Egipto', 'Egypt', 4),
('Islas Feroe', 'Faroe Islands', 4),
('Francia', 'France', 4),
('Cocinero', 'Chef', 5),
('Bombero', 'Firefighter', 5),
('Policía', 'Police officer', 5),
('Barbero', 'Barber', 5),
('Niñero', 'Nanny', 5),
('Periodista', 'Journalist', 5),
('Electricista', 'Electrician', 5),
('Cartero', 'Postman', 5),
('Fotógrafo', 'Photographer', 5),
('Escritora', 'Writer', 5);

-- Insertar datos en la tabla Usuarios
INSERT INTO Usuarios (email, pwd) VALUES
('julio@gmail.com', '12345'),
('felipe@gmail.com', '12345'),
('diego@gmail.com', '12345'),
('ruben@gmail.com ', '12345'),
('abel@gmail.com', '12345'),
('javier@gmail.com', '12345'),
('rosa@gmail.com', '12345'),
('victoria@gmail.com', '12345'),
('pablo@gmail.com ', '12345'),
('leticia@gmail.com', '12345');