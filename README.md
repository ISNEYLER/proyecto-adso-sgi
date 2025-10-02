# Proyecto SGI

Este proyecto utiliza **[Vite](https://vite.dev/guide/)** como entorno de desarrollo, **[React](https://es.react.dev/)** para la construcción de interfaces modernas y dinámicas, y **[TailwindCSS](https://tailwindcss.com/)** como framework de utilidades para el diseño y estilos.

Actualmente, parte del código está implementado en HTML puro, almacenado en la carpeta html/. Esa carpeta se usa como base de referencia temporal. Una vez que el contenido sea migrado a componentes en **JSX** (React), la carpeta html/ será eliminada del proyecto.

## 🚀 Requisitos

* Node.js >= 16

## ⚙️ Instalación

Clona este repositorio e instala las dependencias:

```bash
npm install
```

## ▶️ Ejecutar en desarrollo

Inicia el servidor de desarrollo:

```bash
npm run dev
```

Esto abrirá el proyecto en `http://localhost:5173/`.

## 🛠️ Construcción para producción

Genera la versión optimizada del proyecto:

```bash
npm run build
# o
yarn build
```

## 📂 Estructura del proyecto

```
html/ # Prototipo en HTML puro (se eliminará tras migrar a JSX)
src/
 ├─ assets/        # Archivos estáticos (imágenes, estilos, etc.)
 ├─ components/    # Componentes reutilizables de React
 ├─ App.jsx        # Componente principal
 └─ main.jsx       # Punto de entrada
```