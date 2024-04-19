<?php
// Definir credenciales de la base de datos
$servername = "localhost";
$dbname = "logicNestProyect";
$dbusername = "INGJADE";
$dbpassword = "JADE2023.";

// Conexión con la base de datos
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// =========================================================================================== //
// ======================================== Register CRUD ==================================== //
// =========================================================================================== //

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        // Añadir un nuevo registro a la tabla 'Register'
        $stmt = $conn->prepare("INSERT INTO Register (name, last_name, address, phone, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$_POST['name'], $_POST['last_name'], $_POST['address'], $_POST['phone'], $_POST['email'], $_POST['username'], $_POST['password']]);
    } elseif (isset($_POST['action']) && $_POST['action'] == 'edit') {
        // Actualizar un registro existente en la tabla 'register'
        $stmt = $conn->prepare("UPDATE Register SET name=?, last_name=?, address=?, phone=?, email=?, username=?, password=? WHERE id_register=?");
        $stmt->execute([$_POST['name'], $_POST['last_name'], $_POST['address'], $_POST['phone'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['id_register']]);
    } elseif (isset($_POST['action']) && $_POST['action'] == 'delete') {
        // Eliminar un registro de la tabla 'register'
        $stmt = $conn->prepare("DELETE FROM Register WHERE id_register=?");
        $stmt->execute([$_POST['id_register']]);
    }
}

// Leer los registros de la tabla 'Register'
$stmt_register = $conn->prepare("SELECT id_register, name, last_name, address, phone, email, username, password FROM Register");
$stmt_register->execute();
$result_register = $stmt_register->fetchAll();

// =========================================================================================== //
// ======================================= Gaming Pc CRUD ==================================== //
// =========================================================================================== //

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['actionGamingChairs']) && $_POST['actionGamingChairs'] == 'add') {
        // Añadir un nuevo registro a la tabla 'gaming pc'
        $stmt_chair_add = $conn->prepare("INSERT INTO GamingPc (name, processor, ram, motherboard, graphics_card, solid_disk, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt_chair_add->execute([$_POST['name_pc'], $_POST['processor'], $_POST['ram'], $_POST['motherboard'], $_POST['graphics_card'], $_POST['solid_disk'], $_POST['price']]);
    } elseif (isset($_POST['actionGamingChairs']) && $_POST['actionGamingChairs'] == 'edit') {
        // Actualizar un registro existente en la tabla 'gaming pc'
        $stmt_chair_edit = $conn->prepare("UPDATE GamingPc SET name=?, processor=?, ram=?, motherboard=?, graphics_card=?, solid_disk=?, price=? WHERE id_pc=?");
        $stmt_chair_edit->execute([$_POST['name_pc'], $_POST['processor'], $_POST['ram'], $_POST['motherboard'], $_POST['graphics_card'], $_POST['solid_disk'], $_POST['price'], $_POST['id_pc']]);
    } elseif (isset($_POST['actionGamingChairs']) && $_POST['actionGamingChairs'] == 'delete') {
        // Eliminar un registro de la tabla 'gaming pc'
        $stmt_chair_delete = $conn->prepare("DELETE FROM GamingPc WHERE id_pc=?");
        $stmt_chair_delete->execute([$_POST['id_pc']]);
    }
}

// Leer los registros de la tabla 'GamingPc'
$stmt_chair_read = $conn->prepare("SELECT id_pc, name, processor, ram, motherboard, graphics_card, solid_disk, price FROM GamingPc");
$stmt_chair_read->execute();
$result_chair = $stmt_chair_read->fetchAll();


// =========================================================================================== //
// ==================================== Gaming Monitors CRUD ================================= //
// =========================================================================================== //

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['actionGamingMonitors']) && $_POST['actionGamingMonitors'] == 'add') {
        // Añadir un nuevo registro a la tabla 'gaming Monitors'
        $stmt_chair_add = $conn->prepare("INSERT INTO GamingMonitors (model, size, resolution, brand, update_speed, price_monitors) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_chair_add->execute([$_POST['model_monitors'], $_POST['size_monitors'], $_POST['resolution_monitors'], $_POST['brand_monitors'], $_POST['update_speed_monitors'], $_POST['price_monitors']]);
    } elseif (isset($_POST['actionGamingMonitors']) && $_POST['actionGamingMonitors'] == 'edit') {
        // Actualizar un registro existente en la tabla 'gaming Monitors'
        $stmt_chair_edit = $conn->prepare("UPDATE GamingMonitors SET model=?, size=?, resolution=?, brand=?, update_speed=?, price_monitors=? WHERE id_monitors=?");
        $stmt_chair_edit->execute([$_POST['model_monitors'], $_POST['size_monitors'], $_POST['resolution_monitors'], $_POST['brand_monitors'], $_POST['update_speed_monitors'], $_POST['price_monitors'], $_POST['id_monitors']]);
    } elseif (isset($_POST['actionGamingMonitors']) && $_POST['actionGamingMonitors'] == 'delete') {
        // Eliminar un registro de la tabla 'gaming Monitors'
        $stmt_chair_delete = $conn->prepare("DELETE FROM GamingMonitors WHERE id_monitors=?");
        $stmt_chair_delete->execute([$_POST['id_monitors']]);
    }
}

// Leer los registros de la tabla 'Gaming Monitors'
$stmt_monitors_read = $conn->prepare("SELECT id_monitors, model, size, resolution, brand, update_speed, price_monitors FROM GamingMonitors");
$stmt_monitors_read->execute();
$result_monitors = $stmt_monitors_read->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">

    <style>
        /* Estilos para el botón activo */
        :root {
            --lightPurpleColor: #EB00FF;
        }

        .active {
            background-color: var(--lightPurpleColor);
            border-radius: 50px;
            color: white;
        }

        /* Estilos para ocultar el contenido */
        .tabcontent {
            display: none;
        }

        /* Estilos para los botones */
        .tablinks {
            cursor: pointer;
            padding: 10px;
            border: none;
            outline: none;
        }

        /* Estilo inicial para el primer tab activo */
        #register {
            display: block;
        }
    </style>

</head>
<body>
    <section class="father-container-register-admin">
        <article class="information-container-register-admin">
            <h2 class="title-admin">LogicNestSystems</h2>
            <ul class="li-container-register-admin">
                <li class="li-register-admin tablinks active" onclick="openCategory(event, 'register')"><i class="uil uil-user"></i>Register</li>
                <li class="li-register-admin tablinks" onclick="openCategory(event, 'pcGamingBtn')"><i class="uil uil-inbox"></i>Gaming Pc</li>
                <li class="li-register-admin tablinks" onclick="openCategory(event, 'monitorsBtn')"><i class="uil uil-desktop"></i>Gaming Monitors</li>
                <li class="li-register-admin tablinks" onclick="openCategory(event, 'laptopsBtn')"><i class="uil uil-wheelchair-alt"></i>Gaming Laptops</li>
                <li class="li-register-admin tablinks" onclick="openCategory(event, 'consolesBtn')"><i class="uil uil-wheelchair-alt"></i>Gaming Consoles</li>
                <li class="li-register-admin tablinks" onclick="openCategory(event, 'chairsBtn')"><i class="uil uil-wheelchair-alt"></i>Gaming Chairs</li>
                <li class="li-register-admin tablinks"><i class="uil uil-signout"></i>Log Out</li>
            </ul>

            <p class="description-container-register-admin">
                <span class="description-register-admin">2024 CopyRights Reserved</span>
                <span class="description-register-admin">Privacy - Terms & Conditions</span>
            </p>
        </article>

        <section class="crud-container">

            <article class="information2-container-register-admin tabcontent" id="register">
                <!-- Formulario para añadir/editar -->
                <form class="form-information2-container-register-admin" method="post">
                    <input class="input-form-information2-registr-admin" type="hidden" name="id_register" value="">
                    <input class="input-form-information2-registr-admin" type="hidden" name="action" value="add">
                    <input class="input-form-information2-registr-admin" type="text" name="name" placeholder="Name" required>
                    <input class="input-form-information2-registr-admin" type="text" name="last_name" placeholder="LastName" required>
                    <input class="input-form-information2-registr-admin" type="text" name="address" placeholder="Address" required>
                    <input class="input-form-information2-registr-admin" type="text" name="phone" placeholder="Phone" required>
                    <input class="input-form-information2-registr-admin" type="email" name="email" placeholder="Email" required>
                    <input class="input-form-information2-registr-admin" type="text" name="username" placeholder="User" required>
                    <input class="input-form-information2-registr-admin" type="password" name="password" placeholder="Password" required>
                    <button class="btnSaveIt" type="submit">Guardar</button>
                    <button class="btnSaveIt" onclick="generatePDF('table1')">Generar Reporte</button>
                </form>
                <!-- Tabla de datos -->
                <table class="table-columns-register-admin" border="1">
                    <thead>
                        <tr>
                            <th class="columns-table-register-admin">ID</th>
                            <th class="columns-table-register-admin">NAME</th>
                            <th class="columns-table-register-admin">LASTNAME</th>
                            <th class="columns-table-register-admin">ADDRESS</th>
                            <th class="columns-table-register-admin">PHONE</th>
                            <th class="columns-table-register-admin">EMAIL</th>
                            <th class="columns-table-register-admin">USER</th>
                            <th class="columns-table-register-admin">PASSWORD</th>
                            <th class="columns-table-register-admin">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result_register as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_register']) ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['last_name']) ?></td>
                            <td><?= htmlspecialchars($row['address']) ?></td>
                            <td><?= htmlspecialchars($row['phone']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['username']) ?></td>
                            <td><?= htmlspecialchars($row['password']) ?></td>
                            <td class="container-btn-actions-admin">
                                <form class="form-crud-admin" method="post">
                                    <input type="hidden" name="id_register" value="<?= $row['id_register'] ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button class="delte-btn-admin" type="submit">Delete</button>
                                </form>
                                <button class="edit-btn-admin" onclick="editRecordRegister(
                                    '<?= $row['id_register'] ?>',
                                    '<?= $row['name'] ?>',
                                    '<?= $row['last_name'] ?>',
                                    '<?= $row['address'] ?>',
                                    '<?= $row['phone'] ?>',
                                    '<?= $row['email'] ?>',
                                    '<?= $row['username'] ?>',
                                    '<?= $row['password'] ?>'
                                )">Edit</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    function editRecordRegister(id_register, name, last_name, address, phone, email, username, password) {
                        document.querySelector('[name="id_register"]').value = id_register;
                        document.querySelector('[name="name"]').value = name;
                        document.querySelector('[name="last_name"]').value = last_name;
                        document.querySelector('[name="address"]').value = address;
                        document.querySelector('[name="phone"]').value = phone;
                        document.querySelector('[name="email"]').value = email;
                        document.querySelector('[name="username"]').value = username;
                        document.querySelector('[name="password"]').value = password;

                        document.querySelector('[name="action"]').value = 'edit';
                    }
                </script>
            </article>

            <article class="information3-container-register-admin tabcontent" id="pcGamingBtn">
                <!-- Formulario para añadir/editar -->
                <form class="form-information2-container-register-admin" method="post">
                    <input class="input-form-information2-registr-admin" type="hidden" name="id_pc" value="">
                    <input class="input-form-information2-registr-admin" type="hidden" name="actionGamingChairs" value="add"> <!-- action_chair en lugar de action3 -->
                    <input class="input-form-information2-registr-admin" type="text" name="name_pc" placeholder="Name" required>
                    <input class="input-form-information2-registr-admin" type="text" name="processor" placeholder="Processor" required>
                    <input class="input-form-information2-registr-admin" type="text" name="ram" placeholder="RAM" required>
                    <input class="input-form-information2-registr-admin" type="text" name="motherboard" placeholder="Motherboard" required>
                    <input class="input-form-information2-registr-admin" type="text" name="graphics_card" placeholder="Graphics Card" required>
                    <input class="input-form-information2-registr-admin" type="text" name="solid_disk" placeholder="Solid Disk" required>
                    <input class="input-form-information2-registr-admin" type="text" name="price" placeholder="Price" required>
                    <button class="btnSaveIt" type="submit">Guardar</button>
                    <button class="btnSaveIt" onclick="generatePDF('table2')">Generar Reporte</button>
                </form>

                <!-- Tabla de datos -->
                <table class="table-columns-register-admin" border="1">
                    <thead>
                        <tr>
                            <!-- Encabezados de columnas -->
                            <th class="columns-table-register-admin">ID</th>
                            <th class="columns-table-register-admin">Name</th>
                            <th class="columns-table-register-admin">Processor</th>
                            <th class="columns-table-register-admin">RAM</th>
                            <th class="columns-table-register-admin">MOTHERBOARD</th>
                            <th class="columns-table-register-admin">GRAPHICSCARD</th>
                            <th class="columns-table-register-admin">SOLIDDISK</th>
                            <th class="columns-table-register-admin">PRICE</th>
                            <th class="columns-table-register-admin">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result_chair as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_pc']) ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['processor']) ?></td>
                            <td><?= htmlspecialchars($row['ram']) ?></td>
                            <td><?= htmlspecialchars($row['motherboard']) ?></td>
                            <td><?= htmlspecialchars($row['graphics_card']) ?></td>
                            <td><?= htmlspecialchars($row['solid_disk']) ?></td>
                            <td><?= htmlspecialchars($row['price']) ?></td>
                            <td class="container-btn-actions-admin">
                            <form class="form-crud-admin" method="post">
                                <input type="hidden" name="id_pc" value="<?= $row['id_pc'] ?>">
                                <input type="hidden" name="actionGamingChairs" value="delete"> <!-- Utilizando action3 en lugar de action_chair -->
                                <button class="delte-btn-admin" type="submit">Eliminar</button>
                            </form>
                            <!-- Botón para editar -->
                            <button class="edit-btn-admin" onclick="editRecordPc(
                                '<?= $row['id_pc'] ?>',
                                '<?= $row['name'] ?>',
                                '<?= $row['processor'] ?>',
                                '<?= $row['ram'] ?>',
                                '<?= $row['motherboard'] ?>',
                                '<?= $row['graphics_card'] ?>',
                                '<?= $row['solid_disk'] ?>',
                                '<?= $row['price'] ?>'
                            )">Editar</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    function editRecordPc(id_pc, name_pc, processor, ram, motherboard, graphics_card, solid_disk, price) {
                    document.querySelector('[name="id_pc"]').value = id_pc;
                    document.querySelector('[name="name_pc"]').value = name_pc;
                    document.querySelector('[name="processor"]').value = processor;
                    document.querySelector('[name="ram"]').value = ram;
                    document.querySelector('[name="motherboard"]').value = motherboard;
                    document.querySelector('[name="graphics_card"]').value = graphics_card;
                    document.querySelector('[name="solid_disk"]').value = solid_disk;
                    document.querySelector('[name="price"]').value = price;

                    document.querySelector('[name="actionGamingChairs"]').value = 'edit'; // action_chair en lugar de action
                }
                </script>
            </article>

            <article class="information3-container-register-admin tabcontent" id="monitorsBtn">
                <!-- Formulario para añadir/editar -->
                <form class="form-information2-container-register-admin" method="post">
                    <input class="input-form-information2-registr-admin" type="hidden" name="id_monitors" value="">
                    <input class="input-form-information2-registr-admin" type="hidden" name="actionGamingMonitors" value="add"> <!-- action_chair en lugar de action3 -->
                    <input class="input-form-information2-registr-admin" type="text" name="model_monitors" placeholder="Model" required>
                    <input class="input-form-information2-registr-admin" type="text" name="size_monitors" placeholder="Size" required>
                    <input class="input-form-information2-registr-admin" type="text" name="resolution_monitors" placeholder="Resolution" required>
                    <input class="input-form-information2-registr-admin" type="text" name="brand_monitors" placeholder="Brand" required>
                    <input class="input-form-information2-registr-admin" type="text" name="update_speed_monitors" placeholder="Update Speed" required>
                    <input class="input-form-information2-registr-admin" type="text" name="price_monitors" placeholder="Price" required>
                    <button class="btnSaveIt" type="submit">Guardar</button>
                    <button class="btnSaveIt" onclick="generatePDF('table3')">Generar Reporte</button>
                </form>

                <!-- Tabla de datos -->
                <table class="table-columns-register-admin" border="1">
                    <thead>
                        <tr>
                            <!-- Encabezados de columnas -->
                            <th class="columns-table-register-admin">ID</th>
                            <th class="columns-table-register-admin">MODEL</th>
                            <th class="columns-table-register-admin">SIZE</th>
                            <th class="columns-table-register-admin">RESOLUTION</th>
                            <th class="columns-table-register-admin">BRAND</th>
                            <th class="columns-table-register-admin">UPDATESPEED</th>
                            <th class="columns-table-register-admin">PRICE</th>
                            <th class="columns-table-register-admin">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result_monitors as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_monitors']) ?></td>
                            <td><?= htmlspecialchars($row['model']) ?></td>
                            <td><?= htmlspecialchars($row['size']) ?></td>
                            <td><?= htmlspecialchars($row['resolution']) ?></td>
                            <td><?= htmlspecialchars($row['brand']) ?></td>
                            <td><?= htmlspecialchars($row['update_speed']) ?></td>
                            <td><?= htmlspecialchars($row['price_monitors']) ?></td>
                            <td class="container-btn-actions-admin">
                            <form class="form-crud-admin" method="post">
                                <input type="hidden" name="id_monitors" value="<?= $row['id_monitors'] ?>">
                                <input type="hidden" name="actionGamingMonitors" value="delete"> <!-- Utilizando action3 en lugar de action_chair -->
                                <button class="delte-btn-admin" type="submit">Eliminar</button>
                            </form>
                            <!-- Botón para editar -->
                            <button class="edit-btn-admin" onclick="editRecordMonitors(
                                '<?= $row['id_monitors'] ?>',
                                '<?= $row['model'] ?>',
                                '<?= $row['size'] ?>',
                                '<?= $row['resolution'] ?>',
                                '<?= $row['brand'] ?>',
                                '<?= $row['update_speed'] ?>',
                                '<?= $row['price_monitors'] ?>'
                            )">Editar</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    function editRecordMonitors(id_monitors, model_monitors, size_monitors, resolution_monitors, brand_monitors, update_speed_monitors, price_monitors) {
                    document.querySelector('[name="id_monitors"]').value = id_monitors;
                    document.querySelector('[name="model_monitors"]').value = model_monitors;
                    document.querySelector('[name="size_monitors"]').value = size_monitors;
                    document.querySelector('[name="resolution_monitors"]').value = resolution_monitors;
                    document.querySelector('[name="brand_monitors"]').value = brand_monitors;
                    document.querySelector('[name="update_speed_monitors"]').value = update_speed_monitors;
                    document.querySelector('[name="price_monitors"]').value = price_monitors;

                    document.querySelector('[name="actionGamingMonitors"]').value = 'edit'; // action_chair en lugar de action
                }
                </script>
            </article>
        </section>
    </section>
    <!-- CDN para jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/admin.js"></script>
    <script src="js/report.js"></script>

</body>
</html>