<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Tracker</title>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Budget Tracker</h1>
            <div class="balanceContainer">
                <button id="toggleBalance" class="btnToggle">
                    <i class="fas fa-eye"></i>
                </button>
                <div class="balanceInfo">
                    <p>Total Balance:</p>
                    <h2 id="totalBalance">$2,580.45</h2>
                </div>
            </div>
        </header>

        <div class="actions">
            <button id="addExpenseBtn" class="btnPrimary">
                <i class="fas fa-plus"></i> Add Expense
            </button>
        </div>

        <div class="tableContainer">
            <table id="expensesTable">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="content">
                    <tr>
                        <td>Grocery Shopping</td>
                        <td><span class="categoryFood">Food</span></td>
                        <td>April 20, 2025</td>
                        <td>$85.42</td>
                        <td>
                            <button class="btnEdit"><i class="fas fa-edit"></i></button>
                            <button class="btnDelete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Movie Tickets</td>
                        <td><span class="categoryEntertainment">Entertainment</span></td>
                        <td>April 18, 2025</td>
                        <td>$32.50</td>
                        <td>
                            <button class="btnEdit"><i class="fas fa-edit"></i></button>
                            <button class="btnDelete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Uber Ride</td>
                        <td><span class="categoryTransport">Transport</span></td>
                        <td>April 15, 2025</td>
                        <td>$18.75</td>
                        <td>
                            <button class="btnEdit"><i class="fas fa-edit"></i></button>
                            <button class="btnDelete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Monthly Rent</td>
                        <td><span class="categoryHousing">Housing</span></td>
                        <td>April 1, 2025</td>
                        <td>$1,200.00</td>
                        <td>
                            <button class="btnEdit"><i class="fas fa-edit"></i></button>
                            <button class="btnDelete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Expense Modal -->
    <div id="expenseModal" class="modalContainer">
        <div class="modalContent">
            <span class="closeModal" id="closeModal">&times;</span>
            <h2>Add New Expense</h2>
            <form id="expenseForm">
                <div class="formGroup">
                    <label for="description">Description</label>
                    <input type="text" id="description" required autocomplete="off">
                </div>
                <div class="formGroup">
                    <label for="amount">Amount ($)</label>
                    <input type="number" id="amount" step="0.01" required autocomplete="off"> 
                </div>
                <div class="formGroup">
                    <label for="category">Category</label>
                    <select id="category" required>
                        <option value="">Select Category</option>
                        <option value="Food">Food</option>
                        <option value="Transport">Transport</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Housing">Housing</option>
                        <option value="Utilities">Utilities</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Shopping">Shopping</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="formGroup">
                    <label for="date">Date</label>
                    <input type="date" id="date" required autocomplete="off">
                </div>
                <button type="submit" class="btnSubmit">Add Expense</button>
            </form>
        </div>
    </div>

    <!-- Edit Expense Modal -->
    <div id="editExpenseModal" class="modalContainer">
        <div class="modalContent">
            <span class="closeModal" id="editCloseModal">&times;</span>
            <h2>Edit Expense</h2>
            <form id="editExpenseForm">
                <input type="hidden" name="editId" id="editId">
                <div class="formGroup">
                    <label for="editDescription">Description</label>
                    <input type="text" id="editDescription" required autocomplete="off">
                </div>
                <div class="formGroup">
                    <label for="editAmount">Amount ($)</label>
                    <input type="number" id="editAmount" step="0.01" required autocomplete="off"> 
                </div>
                <div class="formGroup">
                    <label for="editCategory">Category</label>
                    <select id="editCategory" required>
                        <option value="">Select Category</option>
                        <option value="Food">Food</option>
                        <option value="Transport">Transport</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Housing">Housing</option>
                        <option value="Utilities">Utilities</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Shopping">Shopping</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="formGroup">
                    <label for="editDate">Date</label>
                    <input type="date" id="editDate" required autocomplete="off">
                </div>
                <button type="submit" class="btnSubmit">Edit Expense</button>
            </form>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>