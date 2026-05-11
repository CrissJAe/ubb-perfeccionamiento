# Módulo Perfeccionamiento Académico Universidad del Bío-Bío

Automatización de solicitudes y visaciones del proceso de Perfeccionamiento Académico,
integrado a la Intranet Institucional de la Universidad del Bío-Bío.

## Stack

Frontend: Apache 2.4 + mod_rewrite
Backend: PHP 8.4
Motor de plantillas: Smarty
Base de datos: Microsoft SQL Server 2017

## Despliegue con Docker Compose

### 1. Clonar el repositorio
```bash
git clone https://github.com/usuario/ubb-perfeccionamiento.git
cd ubb-perfeccionamiento
```

### 2. Levantar el proyecto
```bash
docker compose up
```

> El proyecto levanta sin necesidad de crear `.env`, ya que todos los valores
> tienen defaults definidos en el `docker-compose.yml`.

### (Opcional) Personalizar variables de entorno
```bash
cp .env.example .env
# Editar .env con los valores reales
```

## Acceso

| Servicio | URL / Puerto |

| Frontend | http://localhost:3000 |
| Backend | http://localhost:8080 |
| SQL Server | localhost:1433 |

## Estructura del repositorio
