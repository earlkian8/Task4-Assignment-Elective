<?php
    class Expenses{
        private $conn;
        private $table = "expenses";

        public function __construct($db){
            $this->conn = $db;
        }

        public function getAllExpenses(){
            $query = "SELECT * FROM " . $this->table;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addExpense($description, $amount, $category, $date){
            $query = "INSERT INTO " . $this->table . " (description, amount, category, date) VALUES (:description, :amount, :category, :date)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([":description" => $description, ":amount" => $amount, ":category" => $category, ":date" => $date]);
        }

        public function updateExpense($id, $description, $amount, $category, $date){
            $query = "UPDATE " . $this->table . " SET description = :description, amount = :amount, category = :category, date = :date WHERE expense_id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([":id" => $id, ":description" => $description, ":amount" => $amount, ":category" => $category, ":date" => $date]);

        }

        public function deleteExpense($id){
            $query = "DELETE FROM " .$this->table . " WHERE expense_id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([":id" => $id]);
        }
    }
?>