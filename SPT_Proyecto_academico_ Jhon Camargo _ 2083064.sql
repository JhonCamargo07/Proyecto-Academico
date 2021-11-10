#Crecion de la base de datos
Create database Proyecto_Academico;
use Proyecto_Academico;

#drop database Proyecto_Academico;

#Tablas
Create table Estudiante(
	IDEstudiantePK integer auto_increment primary key not null,
    NombreEstudiante varchar (50) not null,
    ApellidoEstudiante varchar(50) not null,
    DocEstudiante bigint not null,
    IDUsuarioFK integer not null
);

Create table Profesor(
	IDProfesorPK integer auto_increment primary key not null,
    NombreProfesor varchar (50) not null,
    ApellidoProfesor varchar (50) not null,
    DocProfesor bigint not null,
    EspecialidadProfesor varchar (30) not null,
    IDUsuarioFK integer not null
);

Create table Usuario(
	IDUsuarioPK integer auto_increment primary key not null,
	Usuario varchar (50) not null unique,
    PasswordU varchar (260) not null,
    NombreUsuario varchar(30) not null,
    ApellidoUsuario varchar(30) not null,
    SexoUsuario tinyint not null default '1',
    Email varchar(50) not null,
    Rol tinyint not null default '3',
    EstadoUsuario tinyint not null default '1'
);
DESCRIBE usuario;
Create table AdminAcademico(
	IDAdminAcademicoPK integer primary key auto_increment not null,
	NombreAdmin varchar (50) not null,
    ApellidoAdmin varchar (30) not null,
    DocAdmin bigint not null,
    IDCargoFK integer not null,
    IDUsuarioFK integer not null
);

Create table Cargo(
	IDCargoPK integer primary key auto_increment not null,
    NombreCargo varchar (50) not null
);

Create table MatriculaEstudiante(
	IDMatriculaPK integer auto_increment primary key not null,
    FechaRegistro date not null,
    EstadoMatricula varchar (20) not null,
    IDEstudianteFK integer not null,
    IDAdminAcademicoFK integer not null,
    IDCursoFK integer not null
);

Create table Curso(
	IDCursoPK integer auto_increment primary key  not null,
    CodigoCurso varchar (50) not null
);

Create table Observacion(
	IDObservacionPK integer auto_increment primary key not null,
	FechaObservacion date not null,
    TipoFalta varchar (50) not null,
    DescripcionObservacion varchar (100) not null,
    DescargoObservacion varchar (500) not null,
    IDEstudianteFK integer not null,
    IDProfesorFK integer not null
);

Create table DetalleCalificacion(
	IDDetalle integer auto_increment primary key not null,
    FechaRegistro date not null,
    IDCalificacionFK integer not null,
    IDEstudianteFK integer not null,
    IDProfesorFK integer not null, 
    IDMateriaFK integer not null
);

Create table Materia(
	IDMateriaPK integer auto_increment primary key not null,
    NombreMateria varchar (50) not null,
    HorasSemanales integer not null
);

Create table Calificacion(
	IDCalificacionPK integer auto_increment primary key not null,
    NotaPeriodo1 integer not null,
    NotaPeriodo2 integer not null,
    NotaPeriodo3 integer not null,
    NotaFinal integer not null
);

Create table DetalleInasistencia(
	IDDetalleIPK integer auto_increment primary key not null,
    FechaRegistro date not null,
    ExcusaInasistencia varchar (2) not null,
    EstadoInasistencia varchar (20) not null,
    IDInasistenciaFK integer not null,
    IDEstudianteFK integer not null,
    IDProfesorFK integer not null
);

Create table Inasistencia(
	IDInasistenciaPK integer auto_increment primary key not null,
    FechaInasistencia Date not null
);

Alter table Profesor
add constraint FKPROFESORUSUARIO
foreign key (IDUsuarioFk)
references Usuario(IDUsuarioPK) ON UPDATE CASCADE;

Alter table Estudiante
add constraint FKESTUDIANTEUSUARIO
foreign key (IDUsuarioFK)
references Usuario(IDUsuarioPK) ON UPDATE CASCADE;

Alter table AdminAcademico
add constraint FKCARGOADMIN
foreign key (IDCargoFK)
references Cargo(IDCargoPK) ON UPDATE CASCADE;

Alter table AdminAcademico
add constraint FKADMINUSUARIO
foreign key (IDUsuarioFK)
references Usuario(IDUsuarioPK) ON UPDATE CASCADE;

Alter table MatriculaEstudiante
add constraint FKMATRICULAESTUDIANTE
foreign key (IDEstudianteFK)
references Estudiante(IDEstudiantePK) ON UPDATE CASCADE;

Alter table MatriculaEstudiante
add constraint FKMATRICULAADMIN
foreign key (IDAdminAcademicoFK)
references AdminAcademico(IDAdminAcademicoPK) ON UPDATE CASCADE;

Alter table MatriculaEstudiante
add constraint FKMATRICULACURSO
foreign key (IDCursoFK)
references Curso(IDCursoPK) ON UPDATE CASCADE;

Alter table DetalleCalificacion
add constraint FKDETALLEPROFESOR
foreign key (IDProfesorFK)
references Profesor(IDProfesorPK) ON UPDATE CASCADE;

Alter table DetalleCalificacion
add constraint FKDETALLEESTUDIANTE
foreign key (IDEstudianteFK)
references Estudiante(IDEstudiantePK) ON UPDATE CASCADE;

Alter table DetalleCalificacion 
add constraint FKDETALLEMATERIA
foreign key (IDMateriaFK)
references Materia(IDMateriaPK) ON UPDATE CASCADE;

Alter table DetalleCalificacion
add constraint FKDETALLECALIFICACION
foreign key (IDCalificacionFK)
references Calificacion(IDCalificacionPK) ON UPDATE CASCADE;

Alter table Observacion
add constraint FKOBSERVACIONESTUDIANTE
foreign key (IDEstudianteFK)
references Estudiante(IDEstudiantePK) ON UPDATE CASCADE;

Alter table Observacion
add constraint FKOBSERVACIONPROFESOR
foreign key (IDProfesorFK)
references Profesor(IDProfesorPK) ON UPDATE CASCADE;

Alter table DetalleInasistencia
add constraint FKPROFESORDETALLE
foreign key (IDProfesorFK)
references Profesor(IDProfesorPK) ON UPDATE CASCADE;

Alter table DetalleInasistencia 
add constraint FKESTUDIANTEDETALLE
foreign key (IDEstudianteFK)
references Estudiante(IDEstudiantePK) ON UPDATE CASCADE;

Alter table DetalleInasistencia
add constraint FKINASISTENCIADETALLE
foreign key (IDInasistenciaFK)
references Inasistencia(IDInasistenciaPK) ON UPDATE CASCADE;

#Seleccionar o ver las tablas creadas
show tables;

#Insercion de datos

#Insertar datos en la tabla Usuario
Insert into Usuario (usuario, passwordU) values ('JhonCamargo21', 'Jhon2004'),
('RamiroGonzales25', 'Ramiro26'),
('FelipeMonteblanco15', '13felipe'),
('DanielMorales18', 'D4N131M0'),
('36EdierCortez', 'Eider413'),
('AmparoCadena11', 'Amparo11'),
('JairoCamargo03', 'Jairo062'),
('PaolaCadena0706', '07Paola6'),
('AlanVillamarin23', '2Alan3'),
('DeisyArango15', 'Arango20'),
('JoseAroca02','2Aroca3'),
('ErikaCeballos86', 'Ceballos'),
('TatianaChilito15', 'Chilito1'),
('YessicaHernandez20', 'Ramiro26'),
('DavidLlano0549', '05David1'),
('MaronMartinez14', 'Marlon30'),
('RonaldoNontoa05', 'Emerson5'),
('KarenNavarro25', 'karen30'),
('MaicolMuños14', 'Muños12'),
('MariaRamirez15', 'Mafe0621'),
('AndresRodas364', 'Roas8596'),
('MaicolVasquez', '563maic1'),
('DanielDiaz', 'Diaz222'),
('AngelMurica', 'Angel11'),
('JonathanOsorio15', 'osorio25'),
('JuanTamara26', 'Tamara07');

select * from Usuario;

#Insertar datos en la tabla Curso
Insert into Curso (CodigoCurso) values ('001'),
('002'),
('101'),
('102'),
('201'),
('202'),
('301'),
('302'),
('401'),
('402'),
('501'),
('502'),
('601'),
('602'),
('701'),
('702'),
('801'),
('802'),
('901'),
('902'),
('1001'),
('1002'),
('1003'),
('1101'),
('1102'),
('1103');

Select * from Curso;
describe curso;

#Insertar datos en la tabla Materia
Insert into Materia (NombreMateria, HorasSemanales) values ('Programación', 10),
('Tecnologia', 3),
('Ingles', 3),
('Español', 4),
('Filosofia', 2),
('Teatro', 2),
('Musica', 2),
('Sociales', 3),
('Quimíca', 3),
('Fisica', 3),
('Ciencias Naturales', 4),
('Informatica', 2),
('Matematicas', 4),
('Educación Fisica', 3),
('Recreación', 3),
('Calculo', 4),
('Trigonometria', 4),
('Estadisticas', 3),
('Ciencias Politicas', 2),
('Humanidades', 3),
('Economía', 2),
('Plan Lectores', 3),
('Etica', 2),
('Religión', 2),
('Artes', 2),
('Contabilidad', 2);

Select * from Materia;

#Modificar tabla
#ALTER TABLE Calificacion MODIFY NotaPeriodo1 integer;
#ALTER TABLE Calificacion MODIFY NotaPeriodo2  integer;
#ALTER TABLE Calificacion MODIFY NotaPeriodo3 integer;
#ALTER TABLE Calificacion MODIFY NotaFinal  integer;

describe Calificacion;

#Insertar datos en la tabla Calificacion
Insert into Calificacion (NotaPeriodo1, NotaPeriodo2, NotaPeriodo3, NotaFinal) values (5.0, 5.0, 5.0, 5.0),
(4.5, 5.0, 3.2, 2.3),
(3.07, 4.1, 1.3, 4.9),
(5.0, 4.3, 2.4, 4.2),
(4.0, 5.0, 4.5, 3.5),
(4.9, 3.9, 2.9, 5.0),
(4.3, 4.8, 3.5, 3.3),
(4.07, 3.1, 4.3, 3.9),
(3.0, 5.3, 3.5, 3.2),
(2.3, 4.2, 4.3, 4.5),
(2.3, 1.5, 3.5, 4.0),
(3.5, 4.2, 4.1, 4.9),
(3.12, 4.10, 3.03, 3.99),
(2.87, 4.5, 3.1, 4.9),
(5.00, 3.70, 4.56, 4.4),
(5.0, 4.0, 4.4, 3.2),
(4.9, 3.9, 3.0, 4.8),
(3.3, 4.4, 3.9, 5.0),
(4.3, 3.21, 3.4, 4.5),
(3.2, 5.3, 4.5, 4.2),
(2.3, 3.2, 4.3, 3.5),
(2.3, 4.5, 3.5, 4.5),
(4.5, 3.2, 4.0, 5.0),
(4.01, 3.10, 4.03, 4.65),
(3.87, 4.6, 3.5, 5.0),
(4.9, 4.10, 4.70, 4.5);

Select * from Calificacion;
#delete  from Calificacion

#Insertar datos en la tabla Inasistencia
Insert into Inasistencia (FechaInasistencia) values ('2021/02/19'),
('2021/02/18'),
('2021/02/26'),
('2021/03/01'),
('2021/03/05'),
('2021/03/11'),
('2021/03/15'),
('2021/03/19'),
('2021/03/22'),
('2021/03/25'),
('2021/03/26'),
('2021/03/30'),
('2021/03/31'),
('2021/03/31'),
('2021/04/01'),
('2021/04/05'),
('2021/04/09'),
('2021/04/13'),
('2021/04/16'),
('2021/04/19'),
('2021/04/20'),
('2021/04/21'),
('2021/04/22'),
('2021/04/22'),
('2021/04/23'),
('2021/04/24');

select * from Inasistencia;


#Insertar datos en la tabla cargo
Insert into Cargo (NombreCargo) values ('Rector'),
('Coordinador JM'),
('Coordinador JT'),
('Secretaria JM'),
('Secretaria JT');

Select * from Cargo;

select * from Usuario;

#Insertar datos en la tabla Estudiante
Insert into Estudiante (NombreEstudiante, ApellidoEstudiante, DocEstudiante, EstadoEstudiante, IDUsuarioFK) values 
('Jhon Alexander', 'Camargo Cadena', '1014737507', 'activo', 1),
('Ramiro Eduardo', 'Gonzales Chavarro', '1058765203', 'activo', 2),
('Felipe', 'Monteblanco Ortiz', '1478534203', 'activo', 3),
('Daniel Ignacio', 'Morales Sanchez', '1014737507', 'activo', 4),
('Eider Alexander', 'Cortez Martinez', '1054239740', 'activo', 5),
('Angel yesid', 'Murcia Pinilla', '1047569301', 'activo', 24),
('Emerson Ronaldo', 'Nontoa Combita', '1015464503', 'activo', 17),
('Damaris', 'Arango Perdomo', '1034569801', 'activo', 10),
('Maria Fernanda', 'Ramirez Caballero', '1141357624', 'activo', 20),
('Yasuri Tatiana', 'Chilito Diaz', '1123654789', 'activo', 13),
('Angie Paola', 'Villamarin Cadena', '1023415032', 'activo', 8),
('David Alexander', 'Llano Vargas', '254413214', 'activo', 15);


select * from estudiante where idestudiantePK = 10;

Select *from Estudiante;
#Insertar datos en la tabla Profesor
Insert into Profesor (NombreProfesor, ApellidoProfesor, DocProfesor, EstadoProfesor, especialidadProfesor, IDUsuarioFK) values 
('Amparo', 'Cadena Bobadilla', '26431235', 'activo', 'Economia y filosofia', 6),
('Ramiro Eduardo', 'Gonzales Chavarro', '1058765203', 'activo', 'Idiomas', 2),
('Juan Wilfer', 'Tamara Osorio', '2647812354', 'activo', 'Educación fisica y deportes' , 3),
('Maicol Andres', 'Vazques Pulido', '11543654235', 'activo', 'Etica y religión', 22),
('Marlon Leyton', 'Martinez Obando', '1123459823', 'activo', 'Matematicas, Contabilidad, Calculo, trigonometria', 16),
('Yessica Alejandra', 'Hernandez Martinez', '1236542365', 'activo', 'Teatro, Recreacion, Musica' , 14),
('Maicol Steven', 'Muños Cardenas', '1023145631', 'activo', 'Ingeniero en Sitemas', 19),
('Karen stefany', 'Navarro Rodriguez', '1123459823', 'activo', 'Ciencias naturales y Biología', 5),
('Andres Felipe', 'Rojas Martinez', '12345621324', 'activo', 'sociales e historia', 21);

Select *from Profesor;

#Insertar datos en la tabla AdminAcademico
Insert into AdminAcademico (NombreAdmin, ApellidoAdmin, DocAdmin, EstadoAdmin, IDCargoFK, IDUsuarioFK) values 
('Jhon Jairo', 'Camargo Hernandez', 39836548, 'activo', 1, 7),
('Jose Alejandro', 'Aroca Rivera', 24531882, 'activo', 2, 11),
('Alan Steban', 'Villamarin Cadena', 214136694, 'activo', 3, 9),
('Erika Alejandra', 'Ceballos Zabedra', 41324782, 'activo', 4, 12),
('Daniel Steben', 'Diaz Pelaez', 146235412, 'activo', 5, 23);

describe AdminAcademico;
Select * from AdminAcademico;

#Inseratar datos en la tabla MatriculaEstudiante
Insert into MatriculaEstudiante (FechaRegistro, EstadoMatricula, IDEstudianteFK, IDAdminAcademicoFK, IDCursoFK) values
('2020/11/30', 'activa', 1, 1, 24),
('2020/12/01', 'activa', 5, 2, 24),
('2020/12/03', 'activa', 3, 3, 19),
('2020/12/03', 'activa', 2, 4, 14),
('2020/12/05', 'activa', 4, 3, 14),
('2020/12/07', 'activa', 7, 4, 19),
('2021/01/30', 'activa', 8, 4, 5),
('2021/01/30', 'activa', 6, 5, 9),
('2021/02/01', 'activa', 9, 5, 9),
('2021/02/03', 'activa', 10, 2, 1),
('2021/02/07', 'activa', 12, 3, 5),
('2021/02/15', 'activa', 11, 4, 1);

Insert into MatriculaEstudiante (FechaRegistro, EstadoMatricula, IDEstudianteFK, IDAdminAcademicoFK, IDCursoFK) values
('2020/11/30', 'activa', 1, 1, 24);

#Delete from MatriculaEstudiante where IDMatriculaPK = '15';
Select * from Estudiante;
Select * from AdminAcademico;
Select * from Curso;

select * from MatriculaEstudiante;

#Insertar datos en la tabla DetalleCalificacion
Insert into DetalleCalificacion (FechaRegistro, IDCalificacionFK, IDEstudianteFK, IDProfesorFK, IDMateriaFK) values
('2020/11/17', 1, 1, 7, 1),
('2020/11/17', 2, 2, 1, 7),
('2020/11/17', 3, 3, 2, 3),
('2020/11/17', 4, 4, 3, 14),
('2020/11/17', 5, 5, 7, 1),
('2020/11/17', 6, 6, 8, 11),
('2020/11/17', 7, 7, 9, 24),
('2020/11/17', 8, 8, 6, 6),
('2020/11/17', 9, 9, 4, 23),
('2020/11/17', 10, 10, 5, 17),
('2020/11/17', 11, 11, 2, 4),
('2020/11/17', 12, 12, 3, 15);


Select * from Calificacion;
Select * from Estudiante;
Select * from Profesor;
Select * from Materia;

Select * from DetalleCalificacion;

#Insertar datos en la tabla detalle
Insert into Observacion (FechaObservacion, TipoFalta, DescripcionObservacion, DescargoObservacion, IDEstudianteFK, IDProfesorFK) values
('2020/11/22', 'Mutear al profesor', 'El estudiante me mute aproposito, evitando la continuidad de la clase.', 'Fue sin culpa, el maus se movio 
solo',4, 1),
('2020/10/15', 'No apaga el audio', 'El estudiante enciende el audio a proposito, colocando musica a todo volumen, evitando la continuidad de 
la clase.', 'Era el vecino', 12, 9),
('2020/11/22', 'No entrega trabjos', 'El estudiante no entrega ninguna actividad para el periodo', 'No las entregi porque no tengo internet',
8, 4),
('2020/10/16', 'Entra a una clase con animo de molestar', 'El estudiante entra a clase para molestar y evitar la clase', 'Me pasaron el link que 
no era',10, 8),
('2020/11/01', 'No entra a clases', 'El estudiante unca entra a clases.', 'No tengo internet',5, 7),
('2020/09/21', 'Juega videojuegos en clase', 'No rempondia al llamado por estar jugando', 'Estabamos en clase de ed. fisica y nos sacaron 
a jugar',3, 5);

#delete from Observacion where IDObservacionPK = 1;
Select * from Observacion;

Insert into DetalleInasistencia (FechaRegistro, ExcusaInasistencia, EstadoInasistencia, IDInasistenciafk, IDEstudianteFK, IDProfesorFK) values
('2021/02/19', 'Si', 'Asistió excusa', 1,2, 1),
('2021/02/18', 'Si', 'Asistió excusa', 2,  1, 7),
('2021/02/26', 'No', 'Sin excusa', 3,  3, 5),
('2021/03/01', 'Si', 'Con Excusa', 4, 4, 9),
('2021/03/05', 'No', 'Sin Excusa', 5,  6, 5),
('2021/03/11', 'Si', 'Sin excusa', 6, 5, 7),
('2021/03/15', 'No', 'Con Excusa', 7, 7, 9),
('2021/03/11', 'Si', 'Calamidad publica', 8, 8,3);

#Consultas Generales
Select * from DetalleInasistencia;
Select * from Inasistencia;
Select * from Estudiante;
Select * from Profesor;
Select * from Materia;
Select * from Curso;

#Consultas con where
Select * from DetalleInasistencia where FechaRegistro = '2021/03/11';
Select * from Inasistencia where IDInasistenciaPK = 21;
Select * from Estudiante where nombreEstudiante = 'Jhon Alexander';
Select * from Profesor where DocProfesor = '2647812354';
Select * from Materia where NombreMateria = 'programacion';
Select * from Curso where IDcursoPK = 24;


#Consultas con operadores Lógicos y relacionales
Select * from DetalleInasistencia where FechaRegistro < '2021/03/11';
Select * from Calificacion where NotaFinal <> 5 and not NotaFinal <3;
Select * from Inasistencia where IDInasistenciaPK >= 17 or FechaInasistencia = '2021-04-09';
Select * from Estudiante where nombreEstudiante != 'David Alexander' and not DocEstudiante = '254413214';
Select * from Profesor where IDProfesorPK = 5 and NombreProfesor = 'Marlon Leyton';
Select * from Materia where HorasSemanales > 3 and HorasSemanales < 11;
Select * from Curso where IDcursoPK >= 13 and not  IDCursoPK >= 25;

#Consultas de columnas calculadas.

Select avg(NotaFinal) as Promedio_Nota_Final from Calificacion;
select sum(FechaRegistro) as Con_Excusa from DetalleInasistencia;
Select min(HorasSemanales) as Materia_Menos_Horas from Materia;


#consultas empleando búsqueda de patrones like y not like.
Select * from Materia where NombreMateria like 'E%';
Select * from Estudiante where NombreEstudiante like '%Al%';
Select * from Profesor where EspecialidadProfesor not like 'E%';


#Semana 11 dia 2 (29/04/2021)

#consultas empleando la cláusula having
#Select HorasSemanales, sum(HorasSemanales) as sumaHora from Materia group by horasSemanales having sum(HorasSemanales) > 9;
Select NombreMateria, min(HorasSemanales) as sumaHora from Materia group by NombreMateria having min(HorasSemanales) < 4;
select * from Materia;

select * from DetalleCalificacion;
Select IDProfesorFK, max(FechaRegistro) from DetalleCalificacion group by IDProfesorFK having max(FechaRegistro) = '2020-11-17';

Select count(*) from Estudiante having 1;

Select NombreProfesor,ApellidoProfesor, count(EstadoProfesor) from Profesor
group by ApellidoProfesor
having count(EstadoProfesor) = 'activo';

Select count(*) from Profesor where EstadoProfesor = 'activo';

Select NotaFinal, count(*) from Calificacion
group by NotaFinal
Having count(*)>5;

select IDCalificacionPK, MIN(NotaPeriodo1) from Calificacion;

Select NotaPeriodo1, NOtaperiodo2, Notaperiodo3,((NotaPeriodo1 + NotaPeriodo2 + NotaPeriodo3)/3) as Promedio from Calificacion;

Select (NotaPeriodo1 * 40 / 100) as Porcentaje1, (NotaPeriodo2 * 45 / 100) as Porcentaje2, (NotaPeriodo3 * 15 / 100) as Porcentaje3 from Calificacion;


Select * from Calificacion;

Select CodigoCurso, sum(CodigoCurso) as SumaCursos from Curso
group by CodigoCurso Having sum(CodigoCurso)>2;

#consultas por agrupamiento de registros usando GroupBy

Select FechaInasistencia from Inasistencia group by FechaInasistencia;

Select NotaPeriodo1 from Calificacion group by IDCalificacionPK desc;

Select FechaRegistro from DetalleInasistencia group by IDEstudianteFK;

Select NombreEstudiante from Estudiante group by IDEstudiantePK desc;

Select EspecialidadProfesor from Profesor group by IDUsuarioFK;

#actualizar datos en la tabla Usuario;

Update Usuario 
set Usuario  = 'EiderCortez36'
Where IDusuarioPK = 5;

Update Usuario 
set PasswordU  = 'Jhon007'
Where IDusuarioPK = 1;

Update Usuario 
set Usuario  = 'DamarisArango'
Where IDusuarioPK = 10;

Update Usuario
set PasswordU = 'Erika12'
where IDUsuarioPK = 12; 


update estudiante
set EstadoEstudiante = 'inactivo'
where IDEstudiantePk = 2;

select * from  estudiante;

Update Usuario 
set PasswordU = 'osorio15'
Where IDusuarioPK = 25;

select * from Usuario;

#Actualizar datos en la tabla curso
Update Curso
set CodigoCurso = 'Grado 01'
where IDCursoPK = 1;

#Volver a la normalidad, para continuar con el proceso que se venia llevando (001-002-101-501...)

Update Curso
set CodigoCurso = '001'
where IDCursoPK = 1;

Update Curso
set CodigoCurso = '1101'
where IDCursoPK = 23;

Update Curso
set CodigoCurso = '1102'
where IDCursoPK = 24;

Update Curso
set CodigoCurso = 'Tecnico'
where IDCursoPK = 25;

Update Curso
set CodigoCurso = 'Tecnologo'
where IDCursoPK = 26;

select * from Curso;

#Actualizar datos en la tabla materia

Update Materia
set NombreMateria = 'lengua extranjera'
where IDMateriaPK = 3;

Update Materia
set NombreMateria = 'Lengua Natal'
where IDMateriaPK = 4;

Update Materia
set NombreMateria = 'Recreación y deportes'
where IDMateriaPK = 15;

Update Materia 
set HorasSemanales = 1
where IDMateriaPK =  6;

Update Materia 
set HorasSemanales = 3
where IDMateriaPK =  12;

Select * from Materia;

#Actualizar datos en la tabla Calificacion

update Calificacion
set NotaPeriodo1 = 4
where IDCalificacionPK =  26;

update Calificacion
set NotaPeriodo2 = 3
where IDCalificacionPK =  11;

update Calificacion
set NotaPeriodo3 = 2.6
where IDCalificacionPK =  15;

update Calificacion
set NotaFinal = 4
where IDCalificacionPK =  23;

update Calificacion
set NotaPeriodo3 = 3.6
where IDCalificacionPK =  3;

Select * from Calificacion;



#Actualizar datos en la tabla Inasistencia

Update Inasistencia
set FechaInasistencia = '2021/02/17'
where IDInasistenciaPK = 4;

Update Inasistencia
set FechaInasistencia = '2021/03/25'
where IDInasistenciaPK = 11;

Update Inasistencia
set FechaInasistencia = '2021/04/08'
where IDInasistenciaPK = 17;

Update Inasistencia
set FechaInasistencia = '2021/04/21'
where IDInasistenciaPK = 23;

Update Inasistencia
set FechaInasistencia = '2021/04/26'
where IDInasistenciaPK = 26;

select * from Inasistencia;

#Actualizar datos en la tabla Cargo

Update Cargo
set NombreCargo = 'Rector@'
Where IDCargoPK = 1;

Update Cargo
set NombreCargo = 'Coordinador@ JM'
Where IDCargoPK = 3;

Update Cargo
set NombreCargo = 'Secretari@ JM'
Where IDCargoPK = 5;

Update Cargo
set NombreCargo = 'Secretari@ JT'
Where IDCargoPK = 4;

Update Cargo
set NombreCargo = 'Coordinador@ JT'
Where IDCargoPK = 2;

Select * from Cargo;

#Actulizar datos de la tabla Estudiante

update Estudiante
set NombreEstudiante = 'Andres Felipe'
where IDEstudiantePK = 3;

update Estudiante
set ApellidoEstudiante = 'Gonzales Paez'
where IDEstudiantePK = 2;

update Estudiante
set DocEstudiante = '1524413214'
where IDEstudiantePK = 12;

update Estudiante
set EstadoEstudiante = 'Inactivo'
where IDEstudiantePK = 4;

update Estudiante
set NombreEstudiante = 'Laura Tatiana'
where IDEstudiantePK = 10;

select * from Estudiante;


update Estudiante
set DocEstudiante = '1012754364'
where IDEstudiantePK = 4;

#Actualizar datos de la tabla Profesor

Update Profesor
set ApellidoProfesor = 'Rodas Martinez'
where IDProfesorPK = 9;

Update Profesor
set NombreProfesor = 'Karen Estefany'
where IDProfesorPK = 8;

Update Profesor
set ApellidoProfesor = 'Tamara Celis'
where IDProfesorPK = 3;

Update Profesor
set EstadoProfesor = 'Inactivo'
where IDProfesorPK = 6;

Update Profesor
set EspecialidadProfesor = 'Economia, Derecho y filosofia'
where IDProfesorPK = 1;

Select * from Profesor;

#Actualizar datos de la tabla AdminAcademico

Update AdminAcademico
set NombreAdmin = 'Jose fernando'
Where IDAdminAcademicoPK = 2;

Update AdminAcademico
set ApellidoAdmin = 'Ceballoz Cardenas'
Where IDAdminAcademicoPK = 4;

Update AdminAcademico
set EstadoAdmin = 'Inactivo'
Where IDAdminAcademicoPK = 5;

Update AdminAcademico
set DOcAdmin = 38936548
Where IDAdminAcademicoPK = 1;

Update AdminAcademico
set ApellidoAdmin = 'Camargo Cadena'
Where IDAdminAcademicoPK = 3;

Select * from AdminAcademico;


#Actualizar datos en la tabla MatriculaEstudiante

update MatriculaEstudiante
set FechaRegistro = '2020/11/29'
where IDMatriculaPK = 1;

update MatriculaEstudiante
set EstadoMatricula = 'Inactiva'
where IDMatriculaPK = 3;

update MatriculaEstudiante
set IDEstudianteFK = 4
where IDMatriculaPK = 2;

update MatriculaEstudiante
set IDEstudianteFK = 5
where IDMatriculaPK = 5;

update MatriculaEstudiante
set FechaRegistro = '2021/02/16'
where IDMatriculaPK = 10;

Select * from MatriculaEstudiante;

#Actualizar datos en la tabla DetalleCalificacion

Update DetalleCalificacion
set FechaRegistro = '2020/11/30'
where IDDetalle = 2;

Update DetalleCalificacion
set IDCalificacionFK = '11'
where IDDetalle = 12;

Update DetalleCalificacion
set IDEstudianteFK = '5'
where IDDetalle = 4;

Update DetalleCalificacion
set IDCalificacionFK = '12'
where IDDetalle = 11;

Update DetalleCalificacion
set IDEstudianteFK = '4'
where IDDetalle = 5;

Select * from DetalleCalificacion;


#Actualizar datos en la tabla Observacion

update Observacion
set FechaObservacion = '2020/11/20'
where IDObservacionPK = 2;

update Observacion
set DescargoObservacion = 'El estudiante no entrega ninguna actividad para el periodo'
where IDObservacionPK = 4;

update Observacion
set DescripcionObservacion = 'No rempondia al llamado y por un momento prendio el audio y se escucho los disparos del juego'
where IDObservacionPK = 7;

update Observacion
set DescargoObservacion = 'No tengo internet y no me gustan sus clases'
where IDObservacionPK = 6;

update Observacion
set DescargoObservacion = 'Era el vecino que se puso bravo por no darle la contraseña del internet'
where IDObservacionPK = 3;

Select * from Observacion;

#Actualizar datos en la tabla DetalleInasistencia

Update DetalleInasistencia
set FechaRegistro = '2021/02/20'
where IDDetalleIPk = 42;

Update DetalleInasistencia
set ExcusaInasistencia = 'No'
where IDDetalleIPk = 43;

Update DetalleInasistencia
set EstadoInasistencia = 'Calamidad Familiar'
where IDDetalleIPk = 49;

Update DetalleInasistencia
set EstadoInasistencia = 'Sin excusa'
where IDDetalleIPk = 45;

Update DetalleInasistencia
set ExcusaInasistencia = 'Si'
where IDDetalleIPk = 46;

Select * from DetalleInasistencia;


Set foreign_key_checks=0;
Set SQL_SAFE_UPDATES=0;

#Eliminar datos de las tablas

#Eliminar datos de la tabla Usuario
Delete from Usuario where IDUsuarioPK = 3;

Delete from Usuario where IDUsuarioPK = 13;

Delete from Usuario where IDUsuarioPK = 19;

Delete from Usuario where IDUsuarioPK = 25;

Delete from Usuario where IDUsuarioPK = 23;

Select * from Usuario;


#Eliminar datos de la tabla curso
Delete from Curso where CodigoCurso = 1;

Delete from Curso where CodigoCurso = 1;

Delete from Curso where CodigoCurso = 1;

Delete from Curso where CodigoCurso = 1;

Delete from Curso where CodigoCurso < 1;

Select * from curso;

#Eliminar datos de la tabla Materia

Delete from Materia where IDMateriaPK = 26;

Delete from Materia where IDMateriaPK = 20;

Delete from Materia where IDMateriaPK = 22;

Delete from Materia where IDMateriaPK = 15;

Delete from Materia where IDMateriaPK = 6;

Select * from Materia;

#Eliminar datos de la tabla Calificacion
Delete from Calificacion where IDCalificacionPK = 26;

Delete from Calificacion where IDCalificacionPK = 20;

Delete from Calificacion where IDCalificacionPK = 13;

Delete from Calificacion where IDCalificacionPK = 11;

Delete from Calificacion where IDCalificacionPK = 23;

Select * from Calificacion; 


#Eliminar datos de la tabla Inasistencia 
-- Si funcionó
Delete from Inasistencia where IDInasistenciaPK = 9;

Delete from Inasistencia where IDInasistenciaPK = 19;

Delete from Inasistencia where IDInasistenciaPK = 23;

Delete from Inasistencia where IDInasistenciaPK = 15;

Delete from Inasistencia where IDInasistenciaPK = 26;

Select * from Inasistencia;

#Eliminar datos de la tabla Cargo 
Delete from cargo where IDCargoPK = 3;

Delete from cargo where IDCargoPK = 4;

Select * from Cargo;

#Eliminar datos de la tabla Estudiante
Delete from Estudiante where IDEstudiantePK = 12;

Delete from Estudiante where IDEstudiantePK = 10;

Delete from Estudiante where IDEstudiantePK = 13;

Delete from Estudiante where IDEstudiantePK = 2;

Delete from Estudiante where IDEstudiantePK = 11;

Select * from Estudiante;

#Eliminar datos de la tabla Profesor
Delete from Profesor where IDProfesorPK = 8;

Delete from Profesor where IDProfesorPK = 4;

Delete from Profesor where IDProfesorPK = 7;

Delete from Profesor where IDProfesorPK = 5;

Delete from Profesor where IDProfesorPK = 2;

Select * from Profesor;


#Eliminar datos de la tabla Inasistencia MatriculaEstudiante

delete from MatriculaEstudiante where IDMatriculaPK = 3;

delete from MatriculaEstudiante where IDMatriculaPK = 6;

delete from MatriculaEstudiante where IDMatriculaPK = 12;

delete from MatriculaEstudiante where IDMatriculaPK = 10;

delete from MatriculaEstudiante where IDMatriculaPK = 7;

Select * from MatriculaEstudiante;


delete from DetalleCalificacion where IDDetalle = 10;

delete from DetalleCalificacion where IDDetalle = 10;

delete from DetalleCalificacion where IDDetalle = 10;

delete from DetalleCalificacion where IDDetalle = 10;

delete from DetalleCalificacion where IDDetalle = 10;

Select * from DetalleCalificacion;

#Eliminar datos de la tabla DetalleInasistencia

Delete from DetalleInasistencia where IDDetalleIPK = 8;
 
Delete from DetalleInasistencia where IDDetalleIPK = 3;

Delete from  DetalleInasistencia where IDDetalleIPK = 6;

Delete from DetalleInasistencia where IDDetalleIPK = 2;

Select * from DetalleInasistencia;


-- Eliminar Datos de la tabla Observacion

Delete from Observacion where IDObservacionPK = 6;

Delete from Observacion where IDObservacionPK = 3;

Delete from Observacion where IDObservacionPK = 2;

Select * from Observacion;


#Ordene los datos en forma ascendente OrderBy según el campo que desee en el criterio que aplique.

Select * from Usuario order by Usuario;

Select * from Curso order by CodigoCurso;

Select * from Materia order by NombreMateria;

Select * from Calificacion order by NotaPeriodo1; 

Select * from Inasistencia order by FechaInasistencia;

Select * from Cargo order by NombreCargo;

Select * from estudiante order by ApellidoEstudiante;

Select * from profesor order by EspecialidadProfesor;

Select * from MatriculaEstudiante Order by FechaRegistro;

Select * from DetalleCalificacion order by IDDetalle desc;

Select * from DetalleInasistencia order by FechaRegistro;

Set foreign_key_checks=1;




# Etapa productiva - Semana 15 dia 1 (25/05/2021)
#Consultas multitablas
	-- Primera consulta multitabla
select Est.NombreEstudiante, Est.ApellidoEstudiante, Est.DocEstudiante, usua.usuario, usua.passwordU from Estudiante as est, usuario as usua where 
IDusuarioFK = IDusuarioPK;

	-- Segunda consulta multitabla
Select prof.NombreProfesor, prof.ApellidoProfesor, prof.DocProfesor, Detal.FechaRegistro, Detal.ExcusaInasistencia from Profesor as prof inner join
detalleinasistencia as detal where prof.IDProfesorPK = detal.IDProfesorFK;

	-- Tercera consulta multitabla
Select Est.NombreEstudiante, Est.ApellidoEstudiante, prof.NombreProfesor, prof.ApellidoProfesor, Detal.FechaRegistro, Detal.ExcusaInasistencia,
detal.estadoinasistencia from estudiante as est inner join detalleinasistencia as detal on est.IDEstudiantePK = detal.IDEstudianteFK inner join Profesor as prof on
Prof.IDprofesorPK = detal.IDProfesorFK;

	-- Cuarta consulta multitabla
Select  Cur.CodigoCurso, mater.NombreMateria, Est.NombreEstudiante, Est.ApellidoEstudiante, matri.EstadoMatricula  from Materia as mater inner join detalleCalificacion as detalle
on mater.IDMateriaPK = detalle.IDMateriaFK inner join estudiante as est on est.IDEstudiantePK = detalle.IDEstudianteFK inner join matriculaEstudiante as matri on 
est.IDEstudiantePK = matri.IDEstudianteFK inner join curso as cur on cur.IDCursoPK = matri.IDCursoFK;

	-- Quinta consulta multitabla
Select mater.nombreMateria, Est.NombreEstudiante, Est.ApellidoEstudiante from Materia as mater inner join detalleCalificacion 
as detal on mater.IDMateriaPK = detal.IDMateriaFK inner join estudiante as est on est.IDEstudiantePK = detal.IDEstudianteFK;

	-- Sexta Consulta multitabla
Select cur.codigocurso, est.nombreEstudiante, est.ApellidoEstudiante, NombreAdmin, ApellidoAdmin, matri.FechaRegistro, matri.EstadoMatricula from MatriculaEstudiante as matri 
inner join estudiante as est on est.IDEstudiantePK = matri.IDEstudianteFK inner join curso as cur on cur.IDCursoPK = matri.IDCursoFK inner join adminAcademico as admin on
admin.IDAdminAcademicoPK = matri.IDAdminAcademicoFK;

	-- Septima consulta multitabla
Select cur.codigocurso, est.nombreEstudiante, est.ApellidoEstudiante, est.docEstudiante from estudiante as est inner join MatriculaEstudiante as matri on est.IDEstudiantePK = 
matri.IDEstudianteFK inner join curso as cur on cur.IDCursoPK = matri.IDCursoFK;


#Subconsultas
	-- Primera subconsulta
Select NombreProfesor, ApellidoProfesor, DocProfesor from profesor where IDUsuarioFK = (select IDUsuarioPK from usuario where usuario like 'Amp%');

	-- Segunda subconsulta
Select NombreEstudiante, ApellidoEstudiante, DocEstudiante, estadoEstudiante from estudiante where IDEstudiantePK = (select IDEstudianteFK from detalleinasistencia where 
FechaRegistro = '2021/03/05');
    
	-- Tercera subconsulta
Select FechaObservacion, TipoFalta, DescripcionObservacion, DescargoObservacion from observacion where IDObservacionPK = (select IDEstudianteFK from estudiante where
IDEstudiantePK = 4);


Select * from estudiante;
Select * from adminacademico;
Select * from observacion;
Select * from curso;
Select * from profesor;
Select * from usuario;
Select * from Materia;
Select * from Matriculaestudiante;
Select * from inasistencia;
Select * from detalleinasistencia;
select * from Calificacion;
select * from detalleCalificacion;



#Etapa Productiva Semana 18 dia 1 (15/06/2021)
	-- Crear vistas
#Vista N° 1 - Reporte N° 1 
Create view Vista_Formulario_Matricula (Curso, Nombre_Estudiante, Apellido_Estudiante, N°_Documento, Nombre_Admin, Apellido_Admin, Fecha_Registro, Estado_Matricula)as select 
cur.codigocurso, est.nombreEstudiante, est.ApellidoEstudiante, est.DocEstudiante, NombreAdmin, ApellidoAdmin, matri.FechaRegistro, matri.EstadoMatricula from MatriculaEstudiante 
as matri inner join estudiante as est on est.IDEstudiantePK = matri.IDEstudianteFK inner join curso as cur on cur.IDCursoPK = matri.IDCursoFK inner join adminAcademico as admin 
on admin.IDAdminAcademicoPK = matri.IDAdminAcademicoFK;

Select * from Vista_Formulario_Matricula where N°_Documento = '1014737507';

#Drop view Vista_Formulario_Matricula;
 
#Vista N° 2
Create view Vista_Listado_Materia (Materia, Nombre_Estudiante, Apellido_Estudiante, N°_Documento) as Select Materia.NombreMateria, estudiante.nombreEstudiante, 
estudiante.ApellidoEstudiante, estudiante.DocEstudiante from materia inner join detallecalificacion as detalle on detalle.IDMateriaFK = Materia.IDMateriaPK inner join 
Estudiante on detalle.IDEstudianteFK = estudiante.IDEstudiantePK; 

Select * from Vista_Listado_Materia where Materia = 'Programacion';

#Drop view Vista_Listado_Cursos ;

#Vista N° 3
Create view Vista_Informacion_Materias (Curso, Nombre_Estudiante, Apellido_Estudiante, N°_Documento, Nombre_Admin, Apellido_Admin, Fecha_Registro, Estado_Matricula, Materias) 
as select cur.codigocurso, est.nombreEstudiante, est.ApellidoEstudiante, est.DocEstudiante, NombreAdmin, ApellidoAdmin, matri.FechaRegistro, matri.EstadoMatricula, 
Materia.NombreMateria  from MatriculaEstudiante as matri inner join estudiante as est on est.IDEstudiantePK = matri.IDEstudianteFK inner join curso as cur on cur.IDCursoPK = 
matri.IDCursoFK inner join adminAcademico as admin on admin.IDAdminAcademicoPK = matri.IDAdminAcademicoFK inner join detallecalificacion as detalle on detalle.IDEstudianteFK = 
est.IDEstudiantePK inner join materia on detalle.IDMateriaFK = Materia.IDMateriaPK;

Select * from Vista_Informacion_Materias where N°_Documento = '1141357624';

#Vista N° 4
Create view Vista_Informacion_Estudiante (Curso, N°_Documento, Nombre_Estudiante,Apellido_Estudiante, Nombre_Profesor,Apellido_Profesor, Materia, Horas_Semana) as Select 
Curso.CodigoCurso, est.DocEstudiante, est.nombreEstudiante, est.ApellidoEstudiante, Prof.NombreProfesor, Prof.ApellidoProfesor, materia.NombreMateria, materia.HorasSemanales from 
curso inner join MatriculaEstudiante as matricula on matricula.IDCursoFK = Curso.IDCursoPK inner join estudiante as est on Matricula.IDEstudianteFK = est.IDEstudiantePK inner
join detalleCalificacion as detalle on est.IDEstudiantePK = detalle.IDEstudianteFK inner join Profesor as Prof on detalle.IDProfesorFK = Prof.IDProfesorPK inner join materia 
on detalle.IDMateriaFK = materia.IDMateriaPK;

Select * from Vista_Informacion_Estudiante where N°_Documento = '1054239740';

#Vista N° 5
Create view Vista_Encargado_Matricula (Fecha_Registro, N°_Documento, Nombre_Estudiante,Apellido_Estudiante, NombreAdmin, ApellidoAdmin, Cargo) as Select matricula.fecharegistro, 
est.DocEstudiante, est.nombreEstudiante, est.ApellidoEstudiante, Admin.NombreAdmin, Admin.ApellidoAdmin, Cargo.NombreCargo from matriculaEstudiante as matricula inner join 
estudiante as est on matricula.IDEstudianteFK = IDEstudiantePK inner join AdminAcademico as admin on matricula.IDAdminAcademicoFK = admin.IDAdminAcademicoPK inner join cargo on 
admin.IDCargoFK = Cargo.IDCargoPK;

Select * from Vista_Encargado_Matricula where N°_Documento = '1047569301';


#Vista N° 6 - Reporte N° 2
Create view Vista_Listado_Curso (Curso, Nombre_Estudiante, Apellido_Estudiante, N°_Documento) as Select Curso.CodigoCurso, estud.nombreEstudiante, estud.ApellidoEstudiante, 
estud.DocEstudiante from Curso inner join MatriculaEstudiante as matricula on matricula.IDCursoFK = Curso.IDCursoPK inner join estudiante as estud on estud.IDEstudiantePK = 
matricula.IDEstudianteFK;

Select * from Vista_Listado_Curso where N°_Documento = '1012754364';


Select Estud.NombreEstudiante, Estud.ApellidoEstudiante, Profe.NombreProfesor, Profe.ApellidoProfesor,  materia.NombreMateria from
Estudiante as Estud inner join detalleCalificacion as detalle on detalle.IDEstudianteFK = estud.IDEstudiantePK inner join profesor as Profe on detalle.IDProfesorFK = 
Profe.IDProfesorPK inner join usuario on profe.IDUsuarioFK = Usuario.IDUsuarioPK inner join materia on detalle.IDMateriaFK = materia.IDMateriaPK;


select * from estudiante;



-- Semana 23 Día 1 (10-08-2021) Creación de store procedure y trigger

Delimiter $$
Create procedure prueba_automatizacion_codigo(in nombre_tabla varchar (20))
begin
	select * from nombre_tabla;
end $$
Delimiter ;

Call prueba_automatizacion_codigo('estudiante');
-- drop procedure prueba_automatizacion_codigo;


-- Store PROCEDURE para validar el login
Delimiter $$
Create procedure sp_select_usuario_login(in pUsuario varchar(50))
begin
	SELECT * FROM Usuario WHERE BINARY Usuario = pUsuario;
end $$
Delimiter ;



#Creación de store procedure para usuario

	#insertar
Delimiter $$
Create procedure sp_insert_usuario(
	in pUsuario varchar (50),
    in pPassword varchar(260),
    in pNombre varchar(30),
    in pApellido varchar(30),    
    in pSexo tinyint(4),    
    in pEmail varchar(50), 
    in pRol tinyint(4),
    in pEstado tinyint
)
begin
	insert into Usuario values (null, pUsuario, pPassword, pNombre, pApellido, pSexo, pEmail, pRol, pEstado);
end $$
Delimiter ;
describe usuario;

Call sp_insert_usuario('SofiaCardona','Sofia123');
select * from usuario;

	#consultar all
Delimiter $$
Create procedure sp_select_all_usuario()
begin
	select * from Usuario;
end $$
Delimiter ;

Call sp_select_all_usuario();


Delimiter $$
Create procedure sp_select_last_insert_usuario()
begin
	SELECT * FROM Usuario ORDER BY IDUsuarioPK DESC LIMIT 1;
end $$
Delimiter ;

Call sp_select_last_insert_usuario();

	#consulta con where
Delimiter $$
Create procedure sp_select_any_usuario(in pUsuario varchar(50))
begin
	select * from Usuario where Usuario = pUsuario;
end $$
Delimiter ;

#drop procedure if exists sp_select_some_usuario;

Call sp_select_any_usuario('JhonCamargo21');

	#Update
Delimiter $$
Create procedure sp_update_usuario(
	in pUsuario varchar (50),
    in pPassword varchar(8),
    in pNombre varchar(30),
    in pApellido varchar(30),    
    in pSexo tinyint(4),    
    in pEmail varchar(50), 
    in pRol tinyint(4),
    in pEstado tinyint,
    in pId_Usuario tinyint(4)
)
begin
	update Usuario
    set Usuario = pUsuario, 
    PasswordU = pPassword,
    NombreUsuario = pNombre,
    ApellidoUsuario = pApellido,
    SexoUsuario = pSexo,
    Email = pEmail,
    Rol = pRol,
    Estado = pEstado
    where IDUsuarioPK = pId_Usuario;
end $$
Delimiter ;

Call sp_update_usuario('SofiaCardona', 'Sofia456', 27);


#Creación de store procedure para estudiante
	#insertar
Delimiter $$
Create procedure sp_insert_estudiante(
	in pNombre varchar (50),
    in pApellido varchar(50),
    in pDocumento bigint,
    in pId_Usuario integer
)
begin
	insert into estudiante values (null, pNombre, pApellido, pDocumento, pId_Usuario);
end $$
Delimiter ;
describe estudiante;

Call sp_insert_estudiante();

	#select all
Delimiter $$
Create procedure sp_select_all_estudiante()
begin
	select * from estudiante;
end $$
Delimiter ;

Call sp_select_all_estudiante();

	#consulta con where
Delimiter $$
Create procedure sp_select_some_estudiante(in codigo integer)
begin
	select * from estudiante where idEstudiantePK = codigo;
end $$
Delimiter ;

Call sp_select_some_estudiante(1);

	#Update
Delimiter $$
Create procedure sp_update_estudiante(
	in pNombre varchar (50),
    in pApellido varchar(50),
    in pDocumento bigint,
    in pEstado varchar(50),
	in codigo integer
)
begin
	update estudiante
    set NombreEstudiante = pNombre, ApellidoEstudiante = pApellido, DocEstudiante = pDocumento, EstadoEstudante = pEstado
    where IDEstudiantePK = codigo;
end $$
Delimiter ;

Call sp_update_estudiante();

Delimiter $$
Create procedure sp_select_estudiante_usuario(in pDocumento bigint)
begin
	SELECT * FROM Estudiante inner join Usuario on IDUsuarioPK = IDUsuarioFK where DocEstudiante = pDocumento;
end $$
Delimiter ;



Delimiter $$
Create procedure sp_update_Admin(
	in pNombre varchar (50),
    in pApellido varchar(50),
    in pDocumento bigint,
	in pId integer
)
begin
	UPDATE AdminAcademico 
    SET NombreAdmin = pNombre, 
    ApellidoAdmin = pApellido, 
    DocAdmin = pDocumento 
    WHERE IDAdminAcademicoPK = pId;
end $$
Delimiter ;


	#Inactivar
Delimiter $$
Create procedure sp_inactivar_usuario(
	in pUsuario VARCHAR (50)
)
begin
	update Usuario
    set EstadoUsuario = if (EstadoUsuario = '1', '2', '1')
    where Usuario = pUsuario;
end $$
Delimiter ;
Call sp_inactivar_estudiante(11);

select * from estudiante;
#Creación de store procedure para curso

Delimiter $$
Create procedure sp_insert_curso(in pCodigo varchar(50))
begin
	insert into curso values (null, pCodigo);
end $$
Delimiter ;
describe curso;

Call sp_insert_curso();


	#select all
Delimiter $$
Create procedure sp_select_all_curso()
begin
	select * from curso;
end $$
Delimiter ;

Call sp_select_all_curso();


	#consulta con where
Delimiter $$
Create procedure sp_select_any_curso(in codigo integer)
begin
	select * from curso where idCursoPK = codigo;
end $$
Delimiter ;

Call sp_select_any_curso(26);


	#Update
Delimiter $$
Create procedure sp_update_curso(
    in pCurso varchar(50),
	in codigo integer
)
begin
	update curso
    set CodigoCurso = pCurso
    where IDCursoPK = codigo;
end $$
Delimiter ;

Call sp_update_curso();




#Creación de store procedure para estudiante
	#insert
Delimiter $$
Create procedure sp_insert_matricula_estudiante(
	in pFecha_registro date,
    in pEstado_matricula varchar(20),
    in pID_Estudiante integer,
    in pID_Admin integer,
    in pID_Curso integer
)
begin
	insert into matriculaestudiante values (null, pFecha_Registro, pEstado_matricula, pID_Estudiante, pID_Admin, pID_Curso);
end $$
Delimiter ;
describe matriculaestudiante;

Call sp_insert_matricula_estudiante();


	#select all
Delimiter $$
Create procedure sp_select_all_matricula_estudiante()
begin
	select * from matriculaestudiante;
end $$
Delimiter ;

Call sp_select_all_matricula_estudiante();


	#consulta con where
Delimiter $$
Create procedure sp_select_any_matricula_estudiante(in codigo integer)
begin
	select * from matriculaestudiante where idmatriculaPK = codigo;
end $$
Delimiter ;

Call sp_select_any_matricula_estudiante(1);


	#Update
Delimiter $$
Create procedure sp_update_matricula_estudiante(
	in pFecha_registro date,
    in pEstado_matricula varchar(20),
	in codigo integer
)
begin
	update matriculaestudiante
    set FechaRegistro = pFecha_Registro, EstadoMatricula = pEstado_matricula
    where IDMatriculaPK = codigo;
end $$
Delimiter ;

Call sp_update_matricula_estudiante();



	#Inactivar
Delimiter $$
Create procedure sp_inactivar_matricula_estudiante(
	in codigo integer
)
begin
	update matriculaestudiante
    set EstadoMatricula =  if (EstadoMatricula = 'Activa', 'Inactiva', 'Activa')
    where IDMatriculaPK = codigo;
end $$
Delimiter ;
select * from matriculaestudiante;


Call sp_inactivar_matricula_estudiante(3);

#Crear sp para la crud;

describe profesor;

Delimiter $$
Create procedure sp_insert_profesor(
	in pNombre varchar (50),
    in pApellido varchar(50),
    in pDocumento bigint,
    in pEspecialidad varchar(50),
	in pId_Usuario_FK integer
)
begin
	INSERT INTO Profesor values (null, pNombre, pApellido, pDocumento, pEspecialidad, pId_Usuario_FK);
end $$
Delimiter ;


Delimiter $$
Create procedure sp_select_last_insert_curso()
begin
	SELECT * FROM Cargo ORDER BY IDCargoPK DESC LIMIT 1;
end $$
Delimiter ;

Call sp_select_last_insert_curso();


describe adminacademico;

Delimiter $$
Create procedure sp_insert_admin(
	in pNombre varchar (50),
    in pApellido varchar(50),
    in pDocumento bigint,
    in pId_Cargo_FK integer,
	in pId_Usuario_FK integer
)
begin
	INSERT INTO AdminAcademico values (null, pNombre, pApellido, pDocumento, pId_Cargo_FK, pId_Usuario_FK);
end $$
Delimiter ;

drop procedure sp_insert_admin;


Delimiter $$
Create procedure sp_select_admin(in pDocumento integer)
begin
	SELECT * FROM AdminAcademico inner join Usuario on IDUsuarioPK = IDUsuarioFK inner join Cargo ON IDCargoFK = IDCargoPK WHERE DocAdmin = pDocumento;
end $$
Delimiter ;



Delimiter $$
Create procedure sp_insert_cargo(in pCargo integer)
begin
	INSERT INTO Cargo VALUES (NULL, pCargo);
end $$
Delimiter ;


Delimiter $$
Create procedure sp_update_cargo(
    in pCargo VARCHAR(50),
    in pID integer
)
begin
	UPDATE Cargo 
    SET NombreCargo = pCargo
    WHERE IDCargoPK = pID;
end $$
Delimiter ;


Delimiter $$
Create procedure sp_update_estudiante(
    in pNombre varchar(50),
    in pApellido varchar(50),
    in pDocumento bigint,
    in pID integer
)
begin
	UPDATE Estudiante 
    SET NombreEstudiante = pNombre, 
    ApellidoEstudiante = pApellido, 
    DocEstudiante = pDocumento
    WHERE IDEstudiantePK = pID;
end $$
Delimiter ;


Delimiter $$
Create procedure sp_update_profesor(
    in pNombre varchar(50),
    in pApellido varchar(50),
    in pDocumento bigint,
    in pEspecialidad varchar(30),
    in pID integer
)
begin
	UPDATE Profesor 
    SET NombreProfesor = pNombre, 
    ApellidoProfesor = pApellido, 
    DocProfesor = pDocumento, 
    EspecialidadProfesor = pEspecialidad 
    WHERE IDProfesorPK = pID;
end $$
Delimiter ;


describe usuario;
# Trigger
	#usuario
create table datos_antiguos_usuario(
	idusuarioPK integer auto_increment not null primary key,
    usuario_antiguo varchar (50),
    clave_antigua varchar(8)
);

Delimiter $$
Create trigger before_update_usuario
	before update
    on usuario
    for each row
begin
	insert into usuario_antiguo values (null, old.usuario, old.passwordU);
end $$
Delimiter ;

#drop trigger before_update_usuario;

Delimiter $$
Create trigger before_update_usuario
	before delete
    on usuario
    for each row
begin
	insert into usuario_antiguo values (null, old.usuario, old.passwordU);
end $$
Delimiter ;



	#estudiante
Create table datos_antiguos_Estudiante(
	CodigoEstudiantePK integer auto_increment primary key not null,
    NombreEstudiante varchar (50) not null,
    ApellidoEstudiante varchar(50) not null,
    DocEstudiante bigint not null,
    EstadoEstudiante varchar (50) not null
);

Delimiter $$
Create trigger Before_update_estudiante
	before update
    on estudiante
    for each row
begin
	Insert into datos_antiguos_Estudiante values (null, old.NombreEstudiante, old.ApellidoEstudiante, old.DocEstudiante, old.EstadoEstudiante);
end $$
Delimiter ;

#Modificaciones segun las necesidades del proyecto
describe usuario;
ALTER TABLE usuario MODIFY PasswordU varchar (260) not null;

ALTER TABLE usuario MODIFY Usuario varchar (50) not null unique;

Alter table usuario add NombreUsuario varchar(30) not null default 'Invitad@';
Alter table usuario add ApellidoUsuario varchar(30) not null default 'Anonimo';

Alter table usuario modify NombreUsuario varchar(30) not null default 'Invitad@';
Alter table usuario add ApellidoUsuario varchar(30) not null default 'Anonimo';

Alter table usuario add SexoUsuario tinyint(4) NOT NULL DEFAULT '0';

select * from usuario;

Insert into Usuario values (null,'Maria35Jose', 'Majo35', 'Maria', 'José', 3);

ALTER TABLE Usuario ADD Email VARCHAR(50) not null default 'ejemplo@gmail.com';
ALTER TABLE Usuario ADD Rol TINYINT(4) not null default '3';

ALTER TABLE Usuario AUTO_INCREMENT = 4;
Alter Table Estudiante drop EstadoEstudiante;

Alter Table Profesor drop EstadoProfesor;

Alter Table adminacademico drop EstadoAdmin;

Describe adminacademico; 

#Vistas para el proyecto