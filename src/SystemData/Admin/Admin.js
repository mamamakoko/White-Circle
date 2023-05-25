var modals = document.querySelectorAll(".modal");
var buttons = document.querySelectorAll(".add-button");
var closes = document.querySelectorAll(".close");

buttons.forEach(function (button, index) {
  button.onclick = function () {
    modals[index].style.display = "block";
  };
});

closes.forEach(function (close, index) {
  close.onclick = function () {
    modals[index].style.display = "none";
  };
});

window.onclick = function (event) {
  modals.forEach(function (modal) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  });
};

var editcat = document.querySelectorAll(".edit-cat-button");
var catModal = document.getElementById("category-modal");

editcat.forEach(function (btn) {
  btn.addEventListener("click", function () {
    var categoryID = btn.parentElement.parentElement
      .querySelector("td:first-child")
      .textContent.trim();
    var categoryName = btn.parentElement.parentElement
      .querySelector("td:nth-child(2)")
      .textContent.trim();
    var categoryIDInput = catModal.querySelector("input[name=categoryid]");
    var categoryNameInput = catModal.querySelector("input[name=categoryname]");
    categoryIDInput.value = categoryID;
    categoryNameInput.value = categoryName;
    catModal.style.display = "block";
  });
});

var closeBtn = catModal.querySelector(".close");
closeBtn.addEventListener("click", function () {
  catModal.style.display = "none";
});

window.addEventListener("click", function (event) {
  if (event.target == catModal) {
    catModal.style.display = "none";
  }
});

function deleteCategory(id) {
  if (confirm("Are you sure you want to delete this category?")) {
    window.location.href = "functions.php?action=delete&id=" + id;
  }
}

// ##############################################---Product---##################################################################### //

function deleteProduct(id) {
  if (confirm("Are you sure you want to delete this Product?")) {
    window.location.href = "functions.php?actionpro=delete&id=" + id;
  }
}
