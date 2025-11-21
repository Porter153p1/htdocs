<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Peluquería</title>

    <!-- Bootstrap Random para que se vea bonita la página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  <div class="container mt-4"> <!-- dandole margen al contenido que mostramos -->
<?php
require_once __DIR__ . '/Cliente.php';
require_once __DIR__ . '/Peluquero.php';

function h($s) { return htmlspecialchars($s, ENT_QUOTES, "UTF-8"); }

$action = $_GET['action'] ?? 'list';

echo "<h1>Peluquería CRUD (mysqli)</h1>";
echo "
<p>
  <a href='?action=list'>Ver clientes</a> |
  <a href='?action=new'>Nuevo cliente</a> |
  <a href='?action=peluqueros'>Gestionar peluqueros</a> |
  <a href='?action=new_peluquero'>Nuevo peluquero</a>
</p>
";

switch ($action) {

  // LISTAR CLIENTES
  case "list":
      $clientes = Cliente::all("apellidos,nombre");

      echo "<h2>Listado de clientes</h2>";
      echo "<table border='1' cellpadding='5'>";
      echo "<tr><th>ID</th><th>Apellidos</th><th>Nombre</th><th>Peluquero</th><th>Acciones</th></tr>";

      foreach ($clientes as $c) {
          $peluquero = Cliente::peluqueroNombre($c["peluquero_confianza"]);
          echo "<tr>
              <td>{$c['id']}</td>
              <td>{$c['apellidos']}</td>
              <td>{$c['nombre']}</td>
              <td>$peluquero</td>
              <td>
                  <a href='?action=edit&id={$c['id']}'>Editar</a> |
                  <a href='?action=ver&id={$c['id']}'>Ver</a> |
                  <a href='?action=delete&id={$c['id']}'>Eliminar</a>
              </td>
          </tr>";
      }

      echo "</table>";
      break;

  // NUEVO CLIENTE
  case "new":
      $peluqueros = Peluquero::all("nombre");

      echo "<h2>Nuevo cliente</h2>";
      echo "
      <form method='get'>
          <input type='hidden' name='action' value='create'>
          Apellidos: <input name='apellidos'><br>
          Nombre: <input name='nombre'><br>
          Fecha nacimiento: <input type='date' name='fecha_nacimiento'><br>
          Última visita: <input type='date' name='ultima_visita'><br>
          Teléfono: <input name='telefono'><br>
          Dirección: <input name='direccion'><br>

          Peluquero confianza:
          <select name='peluquero_confianza'>
      ";

      foreach ($peluqueros as $p) {
          echo "<option value='{$p['id']}'>{$p['nombre']}</option>";
      }

      echo "<option value=''>-- Ninguno --</option>
          </select><br><br>

          <button>Guardar</button>
      </form>";
      break;

  // CREAR CLIENTE
  case "create":
      Cliente::create($_GET);
      header("Location: ?action=list");
      exit;

  // EDITAR CLIENTE
  case "edit":
      $id = intval($_GET["id"]);
      $c  = Cliente::find($id);

      if (!$c) { echo "Cliente no encontrado"; break; }

      $peluqueros = Peluquero::all("nombre");

      echo "<h2>Editar cliente</h2>
      <form method='get'>
          <input type='hidden' name='action' value='update'>
          <input type='hidden' name='id' value='{$c['id']}'>";

      echo "
          Apellidos: <input name='apellidos' value='".h($c['apellidos'])."'><br>
          Nombre: <input name='nombre' value='".h($c['nombre'])."'><br>
          Fecha nacimiento: <input type='date' name='fecha_nacimiento' value='".h($c['fecha_nacimiento'])."'><br>
          Última visita: <input type='date' name='ultima_visita' value='".h($c['ultima_visita'])."'><br>
          Teléfono: <input name='telefono' value='".h($c['telefono'])."'><br>
          Dirección: <input name='direccion' value='".h($c['direccion'])."'><br>

          Peluquero confianza:
          <select name='peluquero_confianza'>
      ";

      foreach ($peluqueros as $p) {
          $sel = ($p["id"] == $c["peluquero_confianza"]) ? "selected" : "";
          echo "<option value='{$p['id']}' $sel>{$p['nombre']}</option>";
      }

      echo "<option value=''>-- Ninguno --</option>
          </select><br><br>

          <button>Actualizar</button>
      </form>";
      break;

  // ACTUALIZAR CLIENTE
  case "update":
      Cliente::update($_GET["id"], $_GET);
      header("Location: ?action=list");
      exit;

  // VER CLIENTE
  case "ver":
      $id = intval($_GET["id"]);
      $c  = Cliente::find($id);

      if (!$c) { echo "No existe"; break; }

      echo "<h2>Ver cliente</h2>";

      echo "<p><strong>Apellidos:</strong> " . h($c["apellidos"]) . "</p>";
      echo "<p><strong>Nombre:</strong> " . h($c["nombre"]) . "</p>";
      echo "<p><strong>Fecha nacimiento:</strong> " . h($c["fecha_nacimiento"]) . "</p>";
      echo "<p><strong>Última visita:</strong> " . h($c["ultima_visita"]) . "</p>";
      echo "<p><strong>Teléfono:</strong> " . h($c["telefono"]) . "</p>";
      echo "<p><strong>Dirección:</strong> " . h($c["direccion"]) . "</p>";

      $pNombre = Cliente::peluqueroNombre($c["peluquero_confianza"]);
      echo "<p><strong>Peluquero confianza:</strong> " . h($pNombre) . "</p>";

      echo "<p><a href='?action=list'>Volver</a></p>";
      break;

  // ELIMINAR CLIENTE
  case "delete":
      Cliente::delete($_GET["id"]);
      header("Location: ?action=list");
      exit;

  // PELUQUEROS
  case "peluqueros":
      $peluqueros = Peluquero::all("nombre");

      echo "<h2>Listado de peluqueros</h2>";

      echo "<table border='1' cellpadding='5'>";
      echo "<tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr>";

      foreach ($peluqueros as $p) {
          echo "<tr>
              <td>{$p['id']}</td>
              <td>{$p['nombre']}</td>
              <td>
                  <a href='?action=ver_peluquero&id={$p['id']}'>Ver</a> |
                  <a href='?action=edit_peluquero&id={$p['id']}'>Editar</a> |
                  <a href='?action=delete_peluquero&id={$p['id']}'>Eliminar</a>
              </td>
          </tr>";
      }

      echo "</table><br>";

      break;

  // NUEVO PELUQUERO
  case "new_peluquero":
      echo "<h2>Nuevo Peluquero</h2>
      <form method='get'>
          <input type='hidden' name='action' value='create_peluquero'>
          Nombre: <input name='nombre'><br><br>
          <button>Guardar</button>
      </form>";
      break;

  // CREAR PELUQUERO
  case "create_peluquero":
      Peluquero::create($_GET);
      header("Location: ?action=peluqueros");
      exit;

  // EDITAR PELUQUERO
  case "edit_peluquero":
      $p = Peluquero::find($_GET["id"]);

      if (!$p) { echo "Peluquero no encontrado"; break; }

      echo "<h2>Editar Peluquero</h2>
      <form method='get'>
          <input type='hidden' name='action' value='update_peluquero'>
          <input type='hidden' name='id' value='{$p['id']}'>
          
          Nombre: <input name='nombre' value='".h($p['nombre'])."'><br><br>

          <button>Actualizar</button>
      </form>";
      break;

  // ACTUALIZAR PELUQUERO
  case "update_peluquero":
      Peluquero::update($_GET["id"], $_GET);
      header("Location: ?action=peluqueros");
      exit;

  // VER PELUQUERO
  case "ver_peluquero":
      $p = Peluquero::find($_GET["id"]);
      if (!$p) { echo "Peluquero no encontrado"; break; }

      echo "<h2>Ver peluquero</h2>";
      echo "<p><strong>ID:</strong> {$p['id']}</p>";
      echo "<p><strong>Nombre:</strong> " . h($p['nombre']) . "</p>";
      echo "<p><a href='?action=peluqueros'>Volver</a></p>";
      break;

  // ELIMINAR PELUQUERO
  case "delete_peluquero":
      Peluquero::delete($_GET["id"]);
      header("Location: ?action=peluqueros");
      exit;

}
?>
