//contact form
document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.getElementById('contact-form');
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Form submitted successfully!');
        contactForm.reset();
    });
});

// Add zoom functionality
const artworks = document.querySelectorAll('.zoom');
artworks.forEach((artwork) => {
    artwork.addEventListener('click', () => {
        artwork.classList.toggle('zoomed');
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const timelineItems = document.querySelectorAll(".timeline-item");
  
    timelineItems.forEach(function (item, index) {
      item.style.animationDelay = `${index * 0.2}s`;
    });
  
    timelineItems.forEach(function (item, index) {
      item.addEventListener("click", function () {
        scrollToItem(index);
      });
    });
  
    function scrollToItem(index) {
      timelineItems[index].scrollIntoView({ behavior: "smooth", block: "center" });
    }
  });
  
  // Scroll to top button functionality
const scrollTopButton = document.getElementById('scrollTopButton');

window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        scrollTopButton.style.display = 'block';
    } else {
        scrollTopButton.style.display = 'none';
    }
});

scrollTopButton.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});



document.getElementById('resume-button').addEventListener('click', function() {
    var resumeURL = 'files/resume.pdf';
    window.open(resumeURL, '_blank');
});
