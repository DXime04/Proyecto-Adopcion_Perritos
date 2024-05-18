    document.addEventListener("DOMContentLoaded", function() {
        var currentUrl = window.location.pathname;
        var links = document.querySelectorAll(".nav a");
        links.forEach(function(link) {
            if (link.getAttribute("href") === currentUrl) {
                link.classList.add("active");
            }
        });
    });