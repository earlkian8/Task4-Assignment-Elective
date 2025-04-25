document.addEventListener("DOMContentLoaded", function(){

    const toggleBalanceButton = document.getElementById('toggleBalance');
    const totalBalanceDisplay = document.getElementById('totalBalance');

    // Open Add Modal
    document.getElementById("addExpenseBtn").addEventListener("click", function(event){
        event.preventDefault();
        document.getElementById("expenseModal").classList.add("show");
    });

    // Close Add Modal
    document.getElementById("closeModal").addEventListener("click", function(event){
        event.preventDefault();
        document.getElementById("expenseModal").classList.remove("show");
    });

    // Toggle balance visibility
    let balanceVisible = true;
    toggleBalanceButton.addEventListener('click', function() {
        balanceVisible = !balanceVisible;
        totalBalanceDisplay.style.display = balanceVisible ? 'block' : 'none';
        toggleBalanceButton.innerHTML = balanceVisible ? 
            '<i class="fas fa-eye"></i>' : 
            '<i class="fas fa-eye-slash"></i>';
    });

    getExpenses();

    document.getElementById("expenseForm").addEventListener("submit", function(){
        addExpense();
    });
});

function getExpenses(){
    fetch("api/expense_api.php")
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success'){
            let totalBalance = 0;
            document.getElementById("content").innerHTML = "";

            data.expenses.forEach(expense => {
                document.getElementById("content").innerHTML += `
                    <tr>
                        <td>${expense.description}</td>
                        <td><span class="category${expense.category}">${expense.category}</span></td>
                        <td>${expense.date}</td>
                        <td>$${expense.amount}</td>
                        <td>
                            <button class="btnEdit" data-id=${expense.expense_id}><i class="fas fa-edit"></i></button>
                            <button class="btnDelete" data-id=${expense.expense_id}><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    
                `;

                totalBalance += expense.amount;
                
            });

            document.getElementById("totalBalance").textContent = totalBalance;

            document.querySelectorAll(".btnEdit").forEach(button => {
                button.addEventListener("click", function(event){
                    event.preventDefault();
                    const expenseId = this.getAttribute("data-id");
                    const expenseData = data.expenses.find(e => e.expense_id == expenseId);
                    if(expenseData){
                        showEditModal(expenseData);
                    }
                });
            });

            document.querySelectorAll(".btnDelete").forEach(button => {
                button.addEventListener("click", function(){
                    const expenseId = this.getAttribute("data-id");
                    const expenseData = data.expenses.find(e => e.expense_id == expenseId);
                    if(expenseData){
                        totalBalance -= expenseData.amount;
                        deleteExpense(expenseData);
                        location.reload();
                    }
                });
            });
        }
    })
    .catch(error => console.error(error));
}

function addExpense(){

    const formData = {
        description: document.getElementById("description").value,
        category: document.getElementById("category").value,
        amount: document.getElementById("amount").value,
        date: document.getElementById("date").value
    }
    fetch("api/expense_api.php", {
        method: "POST",
        body: JSON.stringify(formData),
        headers: {"Content-Type": "application/json"}
    })
    .then(response => response.json())
    .then(data => {

    })
    .catch(error => console.error(error));
}

function updateExpense(){
    const formData = {
        editId: Number(document.getElementById("editId").value),
        editDescription: document.getElementById("editDescription").value,
        editCategory: document.getElementById("editCategory").value,
        editAmount: document.getElementById("editAmount").value,
        editDate: document.getElementById("editDate").value
    }
    fetch("api/expense_api.php", {
        method: "PUT",
        body: JSON.stringify(formData),
        headers: {"Content-Type": "application/json"}
    })
    .then(response => response.json())
    .then(data => {

    })
    .catch(error => console.error(error));
}

function deleteExpense(expenseData){
    const formData = {
        deleteId: expenseData.expense_id
    }
    fetch("api/expense_api.php", {
        method: "DELETE",
        body: JSON.stringify(formData),
        headers: {"Content-Type": "application/json"}
    })
    .then(response => response.json())
    .then(data => {

    })
    .catch(error => console.error(error));
}


function showEditModal(expenseData){
    document.getElementById("editId").value = expenseData.expense_id;
    document.getElementById("editDescription").value = expenseData.description;
    document.getElementById("editCategory").value = expenseData.category;
    document.getElementById("editAmount").value = expenseData.amount;
    document.getElementById("editDate").value = expenseData.date;

    // Show Edit Modal
    document.getElementById("editExpenseModal").classList.add("show");

    // Close Edit Modal
    document.getElementById("editCloseModal").addEventListener("click", function(event){
        event.preventDefault();
        document.getElementById("editExpenseModal").classList.remove("show");
    });

    document.getElementById("editExpenseForm").addEventListener("submit", function(){
        updateExpense();
    });
}