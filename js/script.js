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
});