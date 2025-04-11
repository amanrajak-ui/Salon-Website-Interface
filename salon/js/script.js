// Function to show/hide mobile navigation
function showMenu() {
	var navLinks = document.getElementById("navLinks");
	navLinks.style.right = "0";
}

function hideMenu() {
	var navLinks = document.getElementById("navLinks");
	navLinks.style.right = "-200px";
}


document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contactForm");

  form.addEventListener("submit", function (e) {
	e.preventDefault(); // Prevent default page reload

	const formData = new FormData(form);

	fetch("submit_form.php", {
	  method: "POST",
	  body: formData,
	})
	  .then((response) => response.text())
	  .then((data) => {
		if (data.includes("success")) {
		  alert("Message Sent Successfully!");
		  form.reset(); // Clear form fields
		} else {
		  alert("Something went wrong. Try again.");
		  console.log("Server response:", data);
		}
	  })
	  .catch((error) => {
		alert("Error submitting form.");
		console.error("Error:", error);
	  });
  });
});
  
  