
        function loadPage(page) {
    const frame = document.getElementById("content-frame");
    const dashboardGrid = document.getElementById("dashboard-grid");
    const profileCard = document.querySelector(".profile-card");


    frame.src = page;
    frame.style.display = "block";
    dashboardGrid.style.display = "none";
    profileCard.style.display = "none";
}