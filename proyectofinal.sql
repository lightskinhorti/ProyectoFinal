-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 12:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `formularios`
--

CREATE TABLE `formularios` (
  `Identificador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `oferta_id` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `curriculum` varchar(255) DEFAULT NULL,
  `archivo_interes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formularios`
--

INSERT INTO `formularios` (`Identificador`, `nombre`, `apellidos`, `email`, `telefono`, `descripcion`, `oferta_id`, `fecha_creacion`, `curriculum`, `archivo_interes`) VALUES
(15, 'javier', 'hortiguela', 'hortiguelavaliente@gmail.com', '313131', 'ssss', 1, '2024-05-16 12:40:44', 'Curriculum vitae (1).pdf', ''),
(17, 'javier', 'hortiguela', 'ssssss@gmail.com', '7613631', 'ssssssssss', 2, '2024-05-17 10:14:17', 'Curriculum vitae (1).pdf', 'videojuegos.pbix');

-- --------------------------------------------------------

--
-- Table structure for table `ofertas_trabajo`
--

CREATE TABLE `ofertas_trabajo` (
  `Identificador` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ofertas_trabajo`
--

INSERT INTO `ofertas_trabajo` (`Identificador`, `titulo`, `descripcion`) VALUES
(1, 'Desarrollador Web Frontend', 'Estamos buscando un desarrollador web frontend con experiencia en HTML, CSS y JavaScript.'),
(2, 'Ingeniero de Software', 'Se requiere un ingeniero de software con experiencia en desarrollo de aplicaciones móviles.'),
(7, 'Desarrollador Web Senior', 'Estamos buscando un desarrollador web senior con experiencia en tecnologías frontend y backend para unirse a nuestro equipo dinámico. Se requiere experiencia en HTML, CSS, JavaScript, PHP y MySQL.'),
(9, 'Analista de Datos', 'Estamos en búsqueda de un analista de datos con experiencia en análisis estadístico y modelado predictivo. Debe ser experto en herramientas como Python, R y SQL, y tener habilidades sólidas en visualización de datos.'),
(10, 'Gerente de Proyectos de TI', 'Se solicita un gerente de proyectos de TI con experiencia en liderar equipos y entregar proyectos en tiempo y forma. Debe tener fuertes habilidades de comunicación y gestión del tiempo.'),
(11, 'Especialista en Marketing Digital', 'Estamos buscando un especialista en marketing digital con experiencia en SEO, SEM, redes sociales y análisis de datos. Debe ser creativo, proactivo y estar al tanto de las últimas tendencias en marketing digital.'),
(12, 'Desarrollador de Aplicaciones Móviles', 'Se requiere un desarrollador de aplicaciones móviles con experiencia en el desarrollo de aplicaciones nativas y/o híbridas para iOS y Android. Debe tener habilidades en Swift, Kotlin, React Native u otros frameworks relevantes.'),
(13, 'Analista de Seguridad de la Información', 'Buscamos un analista de seguridad de la información para proteger nuestra infraestructura y datos contra amenazas cibernéticas. Debe tener experiencia en auditorías de seguridad, análisis de vulnerabilidades y respuesta a incidentes.'),
(14, 'Ingeniero de Sistemas', 'Estamos en búsqueda de un ingeniero de sistemas con experiencia en administración de servidores, redes y sistemas operativos. Debe tener conocimientos sólidos en Linux, Windows Server y tecnologías de virtualización.'),
(15, 'Asistente Administrativo', 'Se solicita un asistente administrativo para proporcionar apoyo administrativo a nuestro equipo. Debe ser organizado, detallista y tener habilidades en Microsoft Office y gestión de calendario.'),
(16, 'Representante de Atención al Cliente', 'Estamos buscando un representante de atención al cliente para manejar consultas de clientes por teléfono, correo electrónico y chat en línea. Debe tener excelentes habilidades de comunicación y capacidad para resolver problemas.'),
(17, 'Prueba', 'hola este trabajo es para ti');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formularios`
--
ALTER TABLE `formularios`
  ADD PRIMARY KEY (`Identificador`),
  ADD KEY `oferta_id` (`oferta_id`);

--
-- Indexes for table `ofertas_trabajo`
--
ALTER TABLE `ofertas_trabajo`
  ADD PRIMARY KEY (`Identificador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formularios`
--
ALTER TABLE `formularios`
  MODIFY `Identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ofertas_trabajo`
--
ALTER TABLE `ofertas_trabajo`
  MODIFY `Identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formularios`
--
ALTER TABLE `formularios`
  ADD CONSTRAINT `formularios_ibfk_1` FOREIGN KEY (`oferta_id`) REFERENCES `ofertas_trabajo` (`Identificador`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
