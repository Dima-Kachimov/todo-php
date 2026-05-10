const searchInput = document.querySelector("#searchInput");
const taskList = document.querySelector("#taskList");
const searchForm = document.querySelector("#searchForm");

searchForm.addEventListener("submit", function (event) {
  event.preventDefault();
});

searchInput.addEventListener("input", function () {
  const searchText = searchInput.value;

  fetch("/?action=search&search=" + encodeURIComponent(searchText))
    .then(function (response) {
      return response.text();
    })
    .then(function (html) {
      taskList.innerHTML = html;
    });
});
