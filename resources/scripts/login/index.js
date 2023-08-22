import Alert from "bootstrap/js/src/alert";

document.querySelectorAll('[data-component="passwords"]').forEach((group) => {
  const hideIcon = group.querySelector(".hide-icon");
  const input = group.querySelector("input");

  hideIcon.addEventListener("click", () => {
    const type = input.type === "password" ? "text" : "password";
    input.type = type;
  });
});

const alertList = document.querySelectorAll(".alert");
const alerts = [...alertList].map((element) => new Alert(element));
