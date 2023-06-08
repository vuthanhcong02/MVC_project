<?php
// Bước 01: Kiểm tra giá trị của controller và action
// $controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
// $action = isset($_GET['action']) ? $_GET['action'] : 'index';

// // Tạo đường dẫn đầy đủ của file controller
// $controller = ucfirst($controller);
// $controller .= 'Controller';
// $controllerFile = __DIR__ . '/app/controllers/' . $controller . '.php';
// // Kiểm tra xem file controller tồn tại hay không
// if (file_exists($controllerFile)) {
//     // Nếu tồn tại, gọi file controller và tạo đối tượng tương ứng
//     require_once $controllerFile;

//     $controllerObj = new $controller();

//     // Kiểm tra xem action có tồn tại trong controller hay không
//     if (method_exists($controllerObj, $action)) {
//         // Nếu tồn tại, gọi action tương ứng trong controller
//          $controllerObj->$action();
//     }
    
//     else {
//         // Nếu action không tồn tại, xử lý lỗi
//         echo 'Action không tồn tại.';
//     }
// } else {
//     // Nếu controller không tồn tại, xử lý lỗi
//     echo 'Controller không tồn tại.';
// }
// Bước 01: Kiểm tra giá trị của controller và action
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Tạo đường dẫn đầy đủ của file controller
$controller = ucfirst($controller);
$controller .= 'Controller';

// Kiểm tra xem file controller tồn tại trong folder "admin" hay không
$adminControllerFile = __DIR__ . '/app/controllers/admin/' . $controller . '.php';
if (file_exists($adminControllerFile)) {
    // Nếu tồn tại, gọi file controller và tạo đối tượng tương ứng
    require_once $adminControllerFile;

    $controllerObj = new $controller();

    // Kiểm tra xem action có tồn tại trong controller hay không
    if (method_exists($controllerObj, $action)) {
        // Nếu tồn tại, gọi action tương ứng trong controller
        $controllerObj->$action();
    } else {
        // Nếu action không tồn tại, xử lý lỗi
        echo 'Action không tồn tại.';
    }
} else {
    // Kiểm tra xem file controller tồn tại trong folder "user" hay không
    $userControllerFile = __DIR__ . '/app/controllers/user/' . $controller . '.php';
    if (file_exists($userControllerFile)) {
        // Nếu tồn tại, gọi file controller và tạo đối tượng tương ứng
        require_once $userControllerFile;

        $controllerObj = new $controller();

        // Kiểm tra xem action có tồn tại trong controller hay không
        if (method_exists($controllerObj, $action)) {
            // Nếu tồn tại, gọi action tương ứng trong controller
            $controllerObj->$action();
        } else {
            // Nếu action không tồn tại, xử lý lỗi
            echo 'Action không tồn tại.';
        }
    } else {
        // Nếu controller không tồn tại, xử lý lỗi
        echo 'Controller không tồn tại.';
    }
}
?>
