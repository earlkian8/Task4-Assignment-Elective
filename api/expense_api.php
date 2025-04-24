<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type");

    include "database.php";
    include "../class/Expenses.php";

    $database = new Database();
    $db = $database->getConnection();

    $expense = new Expenses($db);

    $method = $_SERVER["REQUEST_METHOD"];

    switch ($method){
        case 'GET':
            $expenses = $expense->getAllExpenses();
            echo json_encode(["status" => "success", "expenses" => $expenses]);
            break;
        case 'POST':
            $postData = file_get_contents("php://input");
            $data = json_decode($postData, true);

            $expense->addExpense($data["description"], $data["amount"], $data["category"], $data["date"]);
            echo json_encode(["status" => "success"]);
            break;
        case 'PUT':
            $putData = file_get_contents("php://input");
            $data = json_decode($putData, true);

            $updateExpense = $expense->updateExpense($data["saveExpenseId"], $data["saveDescription"], $data["saveAmount"], $data["saveCategory"], $data["saveDate"]);
            echo json_encode(["status" => "success", "updateExpense" => $updateExpense]);
            break;
        case 'DELETE':
            $delData = file_get_contents("php://input");
            $data = json_decode($delData, true);

            $deleteExpense = $expense->deleteExpense($data["deleteExpenseId"]);
            echo json_encode(["status" => "success", "deleteExpense" => $deleteExpense]);
            break;
    }
?>