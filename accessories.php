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
    if (isset($_POST['actionGamingPc']) && $_POST['actionGamingPc'] == 'add') {
        // Añadir un nuevo registro a la tabla 'gaming pc'
        $stmt_pc_add = $conn->prepare("INSERT INTO GamingPc (name, processor, ram, motherboard, graphics_card, solid_disk, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt_pc_add->execute([$_POST['name_pc'], $_POST['processor'], $_POST['ram'], $_POST['motherboard'], $_POST['graphics_card'], $_POST['solid_disk'], $_POST['price']]);
    } elseif (isset($_POST['actionGamingPc']) && $_POST['actionGamingPc'] == 'edit') {
        // Actualizar un registro existente en la tabla 'gaming pc'
        $stmt_pc_edit = $conn->prepare("UPDATE GamingPc SET name=?, processor=?, ram=?, motherboard=?, graphics_card=?, solid_disk=?, price=? WHERE id_pc=?");
        $stmt_pc_edit->execute([$_POST['name_pc'], $_POST['processor'], $_POST['ram'], $_POST['motherboard'], $_POST['graphics_card'], $_POST['solid_disk'], $_POST['price'], $_POST['id_pc']]);
    } elseif (isset($_POST['actionGamingPc']) && $_POST['actionGamingPc'] == 'delete') {
        // Eliminar un registro de la tabla 'gaming pc'
        $stmt_pc_delete = $conn->prepare("DELETE FROM GamingPc WHERE id_pc=?");
        $stmt_pc_delete->execute([$_POST['id_pc']]);
    }
}

// Leer los registros de la tabla 'GamingPc'
$stmt_pc_read = $conn->prepare("SELECT id_pc, name, processor, ram, motherboard, graphics_card, solid_disk, price FROM GamingPc");
$stmt_pc_read->execute();
$result_pc = $stmt_pc_read->fetchAll();


// =========================================================================================== //
// ==================================== Gaming Monitors CRUD ================================= //
// =========================================================================================== //

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['actionGamingMonitors']) && $_POST['actionGamingMonitors'] == 'add') {
        // Añadir un nuevo registro a la tabla 'gaming Monitors'
        $stmt_monitors_add = $conn->prepare("INSERT INTO GamingMonitors (model, size, resolution, brand, update_speed, price_monitors) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_monitors_add->execute([$_POST['model_monitors'], $_POST['size_monitors'], $_POST['resolution_monitors'], $_POST['brand_monitors'], $_POST['update_speed_monitors'], $_POST['price_monitors']]);
    } elseif (isset($_POST['actionGamingMonitors']) && $_POST['actionGamingMonitors'] == 'edit') {
        // Actualizar un registro existente en la tabla 'gaming Monitors'
        $stmt_monitors_edit = $conn->prepare("UPDATE GamingMonitors SET model=?, size=?, resolution=?, brand=?, update_speed=?, price_monitors=? WHERE id_monitors=?");
        $stmt_monitors_edit->execute([$_POST['model_monitors'], $_POST['size_monitors'], $_POST['resolution_monitors'], $_POST['brand_monitors'], $_POST['update_speed_monitors'], $_POST['price_monitors'], $_POST['id_monitors']]);
    } elseif (isset($_POST['actionGamingMonitors']) && $_POST['actionGamingMonitors'] == 'delete') {
        // Eliminar un registro de la tabla 'gaming Monitors'
        $stmt_monitors_delete = $conn->prepare("DELETE FROM GamingMonitors WHERE id_monitors=?");
        $stmt_monitors_delete->execute([$_POST['id_monitors']]);
    }
}

// Leer los registros de la tabla 'Gaming Monitors'
$stmt_monitors_read = $conn->prepare("SELECT id_monitors, model, size, resolution, brand, update_speed, price_monitors FROM GamingMonitors");
$stmt_monitors_read->execute();
$result_monitors = $stmt_monitors_read->fetchAll();

// =========================================================================================== //
// ===================================== Gaming Laptops CRUD ================================= //
// =========================================================================================== //

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['actionGamingLaptops']) && $_POST['actionGamingLaptops'] == 'add') {
        // Añadir un nuevo registro a la tabla 'Gaming Laptops'
        $stmt_laptops_add = $conn->prepare("INSERT INTO GamingLaptops (model_laptops, processor_laptops, storage_laptops, dimensions_laptops, screen_resolutions_laptops, ram_laptops, graphics_cards_laptops, price_laptops) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt_laptops_add->execute([$_POST['model_laptops'], $_POST['processor_laptops'], $_POST['storage_laptops'], $_POST['dimensions_laptops'], $_POST['screen_resolutions_laptops'], $_POST['ram_laptops'], $_POST['graphics_cards_laptops'], $_POST['price_laptops']]);
    } elseif (isset($_POST['actionGamingLaptops']) && $_POST['actionGamingLaptops'] == 'edit') {
        // Actualizar un registro existente en la tabla 'Gaming Laptops'
        $stmt_laptops_edit = $conn->prepare("UPDATE GamingLaptops SET model_laptops=?, processor_laptops=?, storage_laptops=?, dimensions_laptops=?, screen_resolutions_laptops=?, ram_laptops=?, graphics_cards_laptops=?, price_laptops=? WHERE id_laptops=?");
        $stmt_laptops_edit->execute([$_POST['model_laptops'], $_POST['processor_laptops'], $_POST['storage_laptops'], $_POST['dimensions_laptops'], $_POST['screen_resolutions_laptops'], $_POST['ram_laptops'], $_POST['graphics_cards_laptops'] , $_POST['price_laptops'], $_POST['id_laptops']]);
    } elseif (isset($_POST['actionGamingLaptops']) && $_POST['actionGamingLaptops'] == 'delete') {
        // Eliminar un registro de la tabla 'Gaming Laptops'
        $stmt_laptops_delete = $conn->prepare("DELETE FROM GamingLaptops WHERE id_laptops=?");
        $stmt_laptops_delete->execute([$_POST['id_laptops']]);
    }
}

// Leer los registros de la tabla 'Gaming Laptops'
$stmt_laptops_read = $conn->prepare("SELECT id_laptops, model_laptops, processor_laptops, storage_laptops, dimensions_laptops, screen_resolutions_laptops, ram_laptops, graphics_cards_laptops, price_laptops FROM GamingLaptops");
$stmt_laptops_read->execute();
$result_laptops = $stmt_laptops_read->fetchAll();

// =========================================================================================== //
// ===================================== Gaming Consoles CRUD ================================= //
// =========================================================================================== //

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['actionGamingConsoles']) && $_POST['actionGamingConsoles'] == 'add') {
        // Añadir un nuevo registro a la tabla 'Gaming Consoles'
        $stmt_consoles_add = $conn->prepare("INSERT INTO GamingConsoles (name_console, model_console, dimensions_console, connectivity_console, powersource_console, price_console) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_consoles_add->execute([$_POST['name_console'], $_POST['model_console'], $_POST['dimensions_console'], $_POST['connectivity_console'], $_POST['powersource_console'], $_POST['price_console']]);
    } elseif (isset($_POST['actionGamingConsoles']) && $_POST['actionGamingConsoles'] == 'edit') {
        // Actualizar un registro existente en la tabla 'Gaming Consoles'
        $stmt_consoles_edit = $conn->prepare("UPDATE GamingConsoles SET name_console=?, model_console=?, dimensions_console=?, connectivity_console=?, powersource_console=?, price_console=? WHERE id_console=?");
        $stmt_consoles_edit->execute([$_POST['name_console'], $_POST['model_console'], $_POST['dimensions_console'], $_POST['connectivity_console'], $_POST['powersource_console'], $_POST['price_console'], $_POST['id_console']]);
    } elseif (isset($_POST['actionGamingConsoles']) && $_POST['actionGamingConsoles'] == 'delete') {
        // Eliminar un registro de la tabla 'Gaming Consoles'
        $stmt_consoles_delete = $conn->prepare("DELETE FROM GamingConsoles WHERE id_console=?");
        $stmt_consoles_delete->execute([$_POST['id_console']]);
    }
}

// Leer los registros de la tabla 'Gaming Consoles'
$stmt_consoles_read = $conn->prepare("SELECT id_console, name_console, model_console, dimensions_console, connectivity_console, powersource_console, price_console FROM GamingConsoles");
$stmt_consoles_read->execute();
$result_consoles = $stmt_consoles_read->fetchAll();

// =========================================================================================== //
// ====================================== Gaming Chairs CRUD ================================= //
// =========================================================================================== //

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['actionGamingChair']) && $_POST['actionGamingChair'] == 'add') {
        // Añadir un nuevo registro a la tabla 'Gaming Chairs'
        $stmt_chair_add = $conn->prepare("INSERT INTO GamingChairs (model_chair, color_chair, filling_material_chair, maximum_capacity_chair, brand_chair, armrest_chair, price_chair) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt_chair_add->execute([$_POST['model_chair'], $_POST['color_chair'], $_POST['filling_material_chair'], $_POST['maximum_capacity_chair'], $_POST['brand_chair'], $_POST['armrest_chair'], $_POST['price_chair']]);
    } elseif (isset($_POST['actionGamingChair']) && $_POST['actionGamingChair'] == 'edit') {
        // Actualizar un registro existente en la tabla 'Gaming Chairs'
        $stmt_chair_edit = $conn->prepare("UPDATE GamingChairs SET model_chair=?, color_chair=?, filling_material_chair=?, maximum_capacity_chair=?, brand_chair=?, armrest_chair=?, price_chair=? WHERE id_chair=?");
        $stmt_chair_edit->execute([$_POST['model_chair'], $_POST['color_chair'], $_POST['filling_material_chair'], $_POST['maximum_capacity_chair'], $_POST['brand_chair'], $_POST['armrest_chair'], $_POST['price_chair'], $_POST['id_chair']]);
    } elseif (isset($_POST['actionGamingChair']) && $_POST['actionGamingChair'] == 'delete') {
        // Eliminar un registro de la tabla 'Gaming Chairs'
        $stmt_chair_delete = $conn->prepare("DELETE FROM GamingChairs WHERE id_chair=?");
        $stmt_chair_delete->execute([$_POST['id_chair']]);
    }
}

// Leer los registros de la tabla 'Gaming Chairs'
$stmt_chair_read = $conn->prepare("SELECT id_chair, model_chair, color_chair, filling_material_chair, maximum_capacity_chair, brand_chair, armrest_chair, price_chair FROM GamingChairs");
$stmt_chair_read->execute();
$result_chair = $stmt_chair_read->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
    <link rel="stylesheet" href="css/accessories.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
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
                <li class="li-register-admin tablinks"><i class="uil uil-signout"></i>Accessories</li>
                <li class="li-register-admin tablinks"><i class="uil uil-signout"></i>Log Out</li>
            </ul>

            <p class="description-container-register-admin">
                <span class="description-register-admin">2024 CopyRights Reserved</span>
                <span class="description-register-admin">Privacy - Terms & Conditions</span>
            </p>
        </article>

        <section class="crud-container">

            <!-- Register CRUD -->
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
                    <button class="btnSaveIt" type="button" onclick="generatePDF()">Generar Reporte</button>
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

            <!-- Gaming Pc CRUD -->
            <article class="information3-container-register-admin tabcontent" id="pcGamingBtn">
                <!-- Formulario para añadir/editar -->
                <form class="form-information2-container-register-admin" method="post">
                    <input class="input-form-information2-registr-admin" type="hidden" name="id_pc" value="">
                    <input class="input-form-information2-registr-admin" type="hidden" name="actionGamingPc" value="add"> <!-- action_chair en lugar de action3 -->
                    <input class="input-form-information2-registr-admin" type="text" name="name_pc" placeholder="Name" required>
                    <input class="input-form-information2-registr-admin" type="text" name="processor" placeholder="Processor" required>
                    <input class="input-form-information2-registr-admin" type="text" name="ram" placeholder="RAM" required>
                    <input class="input-form-information2-registr-admin" type="text" name="motherboard" placeholder="Motherboard" required>
                    <input class="input-form-information2-registr-admin" type="text" name="graphics_card" placeholder="Graphics Card" required>
                    <input class="input-form-information2-registr-admin" type="text" name="solid_disk" placeholder="Solid Disk" required>
                    <input class="input-form-information2-registr-admin" type="text" name="price" placeholder="Price" required>
                    <button class="btnSaveIt" type="submit">Guardar</button>
                    <button class="btnSaveIt" type="button" onclick="generatePDF2()">Generar Reporte</button>
                </form>

                <!-- Tabla de datos -->
                <table class="table-columns-pcGamingBtn-admin" border="1">
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
                        <?php foreach ($result_pc as $row): ?>
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
                                <input type="hidden" name="actionGamingPc" value="delete"> <!-- Utilizando action3 en lugar de action_chair -->
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

                    document.querySelector('[name="actionGamingPc"]').value = 'edit'; // action_chair en lugar de action
                }
                </script>
            </article>

            <!-- Gaming Monitors CRUD -->
            <article class="information4-container-register-admin tabcontent" id="monitorsBtn">
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
                    <button class="btnSaveIt" type="button" onclick="generatePDF3()">Generar Reporte</button>
                </form>

                <!-- Tabla de datos -->
                <table class="table-columns-monitorsBtn-admin" border="1">
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

            <!-- Gaming Laptops CRUD -->
            <article class="information5-container-register-admin tabcontent" id="laptopsBtn">
                <!-- Formulario para añadir/editar -->
                <form class="form-information2-container-register-admin" method="post">
                    <input class="input-form-information2-registr-admin" type="hidden" name="id_laptops" value="">
                    <input class="input-form-information2-registr-admin" type="hidden" name="actionGamingLaptops" value="add"> <!-- action_chair en lugar de action3 -->
                    <input class="input-form-information2-registr-admin" type="text" name="model_laptops" placeholder="Model" required>
                    <input class="input-form-information2-registr-admin" type="text" name="processor_laptops" placeholder="Processor" required>
                    <input class="input-form-information2-registr-admin" type="text" name="storage_laptops" placeholder="Storage" required>
                    <input class="input-form-information2-registr-admin" type="text" name="dimensions_laptops" placeholder="Dimensions" required>
                    <input class="input-form-information2-registr-admin" type="text" name="screen_resolutions_laptops" placeholder="Screen Resolutions" required>
                    <input class="input-form-information2-registr-admin" type="text" name="ram_laptops" placeholder="Ram" required>
                    <input class="input-form-information2-registr-admin" type="text" name="graphics_cards_laptops" placeholder="Graphics Cards" required>
                    <input class="input-form-information2-registr-admin" type="text" name="price_laptops" placeholder="Price" required>
                    <button class="btnSaveIt" type="submit">Guardar</button>
                    <button class="btnSaveIt" type="button" onclick="generatePDF4()">Generar Reporte</button>
                </form>

                <!-- Tabla de datos -->
                <table class="table-columns-laptopsBtn-admin" border="1">
                    <thead>
                        <tr>
                            <!-- Encabezados de columnas -->
                            <th class="columns-table-register-admin">ID</th>
                            <th class="columns-table-register-admin">MODEL</th>
                            <th class="columns-table-register-admin">PROCESSOR</th>
                            <th class="columns-table-register-admin">STORAGE</th>
                            <th class="columns-table-register-admin">DIMENSIONS</th>
                            <th class="columns-table-register-admin">SCREEN RESOLUTIONS</th>
                            <th class="columns-table-register-admin">RAM</th>
                            <th class="columns-table-register-admin">GRAPHICS CARDS</th>
                            <th class="columns-table-register-admin">PRICE</th>
                            <th class="columns-table-register-admin">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result_laptops as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_laptops']) ?></td>
                            <td><?= htmlspecialchars($row['model_laptops']) ?></td>
                            <td><?= htmlspecialchars($row['processor_laptops']) ?></td>
                            <td><?= htmlspecialchars($row['storage_laptops']) ?></td>
                            <td><?= htmlspecialchars($row['dimensions_laptops']) ?></td>
                            <td><?= htmlspecialchars($row['screen_resolutions_laptops']) ?></td>
                            <td><?= htmlspecialchars($row['ram_laptops']) ?></td>
                            <td><?= htmlspecialchars($row['graphics_cards_laptops']) ?></td>
                            <td><?= htmlspecialchars($row['price_laptops']) ?></td>
                            <td class="container-btn-actions-admin">
                            <form class="form-crud-admin" method="post">
                                <input type="hidden" name="id_laptops" value="<?= $row['id_laptops'] ?>">
                                <input type="hidden" name="actionGamingLaptops" value="delete"> <!-- Utilizando action3 en lugar de action_chair -->
                                <button class="delte-btn-admin" type="submit">Eliminar</button>
                            </form>
                            <!-- Botón para editar -->
                            <button class="edit-btn-admin" onclick="editRecordLaptops(
                                '<?= $row['id_laptops'] ?>',
                                '<?= $row['model_laptops'] ?>',
                                '<?= $row['processor_laptops'] ?>',
                                '<?= $row['storage_laptops'] ?>',
                                '<?= $row['dimensions_laptops'] ?>',
                                '<?= $row['screen_resolutions_laptops'] ?>',
                                '<?= $row['ram_laptops'] ?>',
                                '<?= $row['graphics_cards_laptops'] ?>',
                                '<?= $row['price_laptops'] ?>'
                            )">Editar</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    function editRecordLaptops(id_laptops, model_laptops, processor_laptops, storage_laptops, dimensions_laptops, screen_resolutions_laptops, ram_laptops, graphics_cards_laptops, price_laptops) {
                    document.querySelector('[name="id_laptops"]').value = id_laptops;
                    document.querySelector('[name="model_laptops"]').value = model_laptops;
                    document.querySelector('[name="processor_laptops"]').value = processor_laptops;
                    document.querySelector('[name="storage_laptops"]').value = storage_laptops;
                    document.querySelector('[name="dimensions_laptops"]').value = dimensions_laptops;
                    document.querySelector('[name="screen_resolutions_laptops"]').value = screen_resolutions_laptops;
                    document.querySelector('[name="ram_laptops"]').value = ram_laptops;
                    document.querySelector('[name="graphics_cards_laptops"]').value = graphics_cards_laptops;
                    document.querySelector('[name="price_laptops"]').value = price_laptops;

                    document.querySelector('[name="actionGamingLaptops"]').value = 'edit'; // action_chair en lugar de action
                }
                </script>
            </article>

            <!-- Gaming Consoles CRUD -->
            <article class="information5-container-register-admin tabcontent" id="consolesBtn">
                <!-- Formulario para añadir/editar -->
                <form class="form-information2-container-register-admin" method="post">
                    <input class="input-form-information2-registr-admin" type="hidden" name="id_console" value="">
                    <input class="input-form-information2-registr-admin" type="hidden" name="actionGamingConsoles" value="add"> <!-- action_chair en lugar de action3 -->
                    <input class="input-form-information2-registr-admin" type="text" name="name_console" placeholder="Name" required>
                    <input class="input-form-information2-registr-admin" type="text" name="model_console" placeholder="Model" required>
                    <input class="input-form-information2-registr-admin" type="text" name="dimensions_console" placeholder="Dimensions" required>
                    <input class="input-form-information2-registr-admin" type="text" name="connectivity_console" placeholder="Connectivity" required>
                    <input class="input-form-information2-registr-admin" type="text" name="powersource_console" placeholder="PowerSource" required>
                    <input class="input-form-information2-registr-admin" type="text" name="price_console" placeholder="Price" required>
                    <button class="btnSaveIt" type="submit">Guardar</button>
                    <button class="btnSaveIt" type="button" onclick="generatePDF5()">Generar Reporte</button>
                </form>

                <!-- Tabla de datos -->
                <table class="table-columns-consolesBtn-admin" border="1">
                    <thead>
                        <tr>
                            <!-- Encabezados de columnas -->
                            <th class="columns-table-register-admin">ID</th>
                            <th class="columns-table-register-admin">NAME</th>
                            <th class="columns-table-register-admin">MODEL</th>
                            <th class="columns-table-register-admin">DIMENSIONS</th>
                            <th class="columns-table-register-admin">CONNECTIVITY</th>
                            <th class="columns-table-register-admin">POWERSOURCE</th>
                            <th class="columns-table-register-admin">PRICE</th>
                            <th class="columns-table-register-admin">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result_consoles as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_console']) ?></td>
                            <td><?= htmlspecialchars($row['name_console']) ?></td>
                            <td><?= htmlspecialchars($row['model_console']) ?></td>
                            <td><?= htmlspecialchars($row['dimensions_console']) ?></td>
                            <td><?= htmlspecialchars($row['connectivity_console']) ?></td>
                            <td><?= htmlspecialchars($row['powersource_console']) ?></td>
                            <td><?= htmlspecialchars($row['price_console']) ?></td>
                            <td class="container-btn-actions-admin">
                            <form class="form-crud-admin" method="post">
                                <input type="hidden" name="id_console" value="<?= $row['id_console'] ?>">
                                <input type="hidden" name="actionGamingConsoles" value="delete"> <!-- Utilizando action3 en lugar de action_chair -->
                                <button class="delte-btn-admin" type="submit">Eliminar</button>
                            </form>
                            <!-- Botón para editar -->
                            <button class="edit-btn-admin" onclick="editRecordConsoles(
                                '<?= $row['id_console'] ?>',
                                '<?= $row['name_console'] ?>',
                                '<?= $row['model_console'] ?>',
                                '<?= $row['dimensions_console'] ?>',
                                '<?= $row['connectivity_console'] ?>',
                                '<?= $row['powersource_console'] ?>',
                                '<?= $row['price_console'] ?>'
                            )">Editar</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    function editRecordConsoles(id_console, name_console, model_console, dimensions_console, connectivity_console, powersource_console, price_console) {
                    document.querySelector('[name="id_console"]').value = id_console;
                    document.querySelector('[name="name_console"]').value = name_console;
                    document.querySelector('[name="model_console"]').value = model_console;
                    document.querySelector('[name="dimensions_console"]').value = dimensions_console;
                    document.querySelector('[name="connectivity_console"]').value = connectivity_console;
                    document.querySelector('[name="powersource_console"]').value = powersource_console;
                    document.querySelector('[name="price_console"]').value = price_console;

                    document.querySelector('[name="actionGamingConsoles"]').value = 'edit'; // action_chair en lugar de action
                }
                </script>
            </article>

            <!-- Gaming Chairs CRUD -->
            <article class="information5-container-register-admin tabcontent" id="chairsBtn">
                <!-- Formulario para añadir/editar -->
                <form class="form-information2-container-register-admin" method="post">
                    <input class="input-form-information2-registr-admin" type="hidden" name="id_chair" value="">
                    <input class="input-form-information2-registr-admin" type="hidden" name="actionGamingChair" value="add"> <!-- action_chair en lugar de action3 -->
                    <input class="input-form-information2-registr-admin" type="text" name="model_chair" placeholder="Model" required>
                    <input class="input-form-information2-registr-admin" type="text" name="color_chair" placeholder="Color" required>
                    <input class="input-form-information2-registr-admin" type="text" name="filling_material_chair" placeholder="Filling Material" required>
                    <input class="input-form-information2-registr-admin" type="text" name="maximum_capacity_chair" placeholder="Maximum Capacity" required>
                    <input class="input-form-information2-registr-admin" type="text" name="brand_chair" placeholder="Brand" required>
                    <input class="input-form-information2-registr-admin" type="text" name="armrest_chair" placeholder="ArmRest" required>
                    <input class="input-form-information2-registr-admin" type="text" name="price_chair" placeholder="Price" required>
                    <button class="btnSaveIt" type="submit">Guardar</button>
                    <button class="btnSaveIt" type="button" onclick="generatePDF6()">Generar Reporte</button>
                </form>

                <!-- Tabla de datos -->
                <table class="table-columns-chairsBtn-admin" border="1">
                    <thead>
                        <tr>
                            <!-- Encabezados de columnas -->
                            <th class="columns-table-register-admin">ID</th>
                            <th class="columns-table-register-admin">MODEL</th>
                            <th class="columns-table-register-admin">COLOR</th>
                            <th class="columns-table-register-admin">FILLING MATERIAL</th>
                            <th class="columns-table-register-admin">MAXIMUM CAPACITY</th>
                            <th class="columns-table-register-admin">BRAND</th>
                            <th class="columns-table-register-admin">ARMREST</th>
                            <th class="columns-table-register-admin">PRICE</th>
                            <th class="columns-table-register-admin">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result_chair as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_chair']) ?></td>
                            <td><?= htmlspecialchars($row['model_chair']) ?></td>
                            <td><?= htmlspecialchars($row['color_chair']) ?></td>
                            <td><?= htmlspecialchars($row['filling_material_chair']) ?></td>
                            <td><?= htmlspecialchars($row['maximum_capacity_chair']) ?></td>
                            <td><?= htmlspecialchars($row['brand_chair']) ?></td>
                            <td><?= htmlspecialchars($row['armrest_chair']) ?></td>
                            <td><?= htmlspecialchars($row['price_chair']) ?></td>
                            <td class="container-btn-actions-admin">
                            <form class="form-crud-admin" method="post">
                                <input type="hidden" name="id_chair" value="<?= $row['id_chair'] ?>">
                                <input type="hidden" name="actionGamingChair" value="delete"> <!-- Utilizando action3 en lugar de action_chair -->
                                <button class="delte-btn-admin" type="submit">Eliminar</button>
                            </form>
                            <!-- Botón para editar -->
                            <button class="edit-btn-admin" onclick="editRecordChair(
                                '<?= $row['id_chair'] ?>',
                                '<?= $row['model_chair'] ?>',
                                '<?= $row['color_chair'] ?>',
                                '<?= $row['filling_material_chair'] ?>',
                                '<?= $row['maximum_capacity_chair'] ?>',
                                '<?= $row['brand_chair'] ?>',
                                '<?= $row['armrest_chair'] ?>',
                                '<?= $row['price_chair'] ?>'
                            )">Editar</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    function editRecordChair(id_chair, model_chair, color_chair, filling_material_chair, maximum_capacity_chair, brand_chair, armrest_chair, price_chair) {
                    document.querySelector('[name="id_chair"]').value = id_chair;
                    document.querySelector('[name="model_chair"]').value = model_chair;
                    document.querySelector('[name="color_chair"]').value = color_chair;
                    document.querySelector('[name="filling_material_chair"]').value = filling_material_chair;
                    document.querySelector('[name="maximum_capacity_chair"]').value = maximum_capacity_chair;
                    document.querySelector('[name="brand_chair"]').value = brand_chair;
                    document.querySelector('[name="armrest_chair"]').value = armrest_chair;
                    document.querySelector('[name="price_chair"]').value = price_chair;

                    document.querySelector('[name="actionGamingChair"]').value = 'edit'; // action_chair en lugar de action
                }
                </script>
            </article>

        </section>
    </section>

    <script src="js/admin.js"></script>
    <script src="js/report.js"></script>

</body>
</html>